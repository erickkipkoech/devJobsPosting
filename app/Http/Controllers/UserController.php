<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    //
     //Create user
     public function create(){
        return view('users.register');
    }

    //Store user
    public function store(Request $request){
        $formFields=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required|confirmed|min:7'
        ]);

        //Hash password
        $formFields['password']=bcrypt($formFields['password']);

        //create user
        $user=User::create($formFields);

        //login after sign up
        auth()->login($user);
        return redirect('/')->with('message','You have been successfully registered');
    }
    
    //logout
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','You have been logged out!');
    }

    //Show login form
    public function login(){
        return view('users.login');
    }
    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','Logged in successfully!');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}
