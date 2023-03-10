<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Project
//all listings by route
/*Route::get('/', function () {
    return view('listings',
[
'listings'=>Listing::all()
]);
});*/

//Single Listing by route
/*Route::get('/listing/{listing}',function(Listing $listing){
    return view('listing',
    ['listing'=>$listing]);
   
});*/

//All listings through a controller
Route::get('/',[ListingController::class,'index']);

//Show create Form
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth'); 

//Store data in create form
Route::post('/listings',[ListingController::class,'store'])->middleware('auth');

//Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Edit submit to update
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

//Manage own listings
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

//Single Listing Through a controller
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//show register form
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//Store user data
Route::post('/users',[UserController::class,'store']);

//Log user out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//Show login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//log in user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

//examples
Route::get('/hello', function(){
    return response('<h1>Hello World</h1>',200)
    ->header('Content-Type','text/plain')
    ->header('foo','bar');
    
});

Route::get('/posts/{id}', function($id){
    ddd($id);
    return response('Post '.$id);

})->where('id','[0-9]+');

Route::get('/search',function(Request $request){
    dd($request->name.' '.$request->city);
});


