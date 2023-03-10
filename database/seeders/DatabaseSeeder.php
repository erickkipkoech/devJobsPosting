<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  \App\Models\User::factory(3)->create();
        $user=User::factory()->create([
            'name'=>'John Doe',
            'email'=>'john@gmail.com'
        ]);
         Listing::factory(6)->create([
            'user_id' => $user->id
         ]);
        // Listing::create([
        //     'title'=>'Laravel Developer',
        //     'tags'=>'Backend,Laravel,Vue',
        //     'company'=>'Sol Company',
        //     'location'=>'New York,NY',
        //     'email'=>'cheruiyotkipkoecher@gmail.com',
        //     'website'=>'sol.net',
        //     'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop'
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
