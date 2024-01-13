<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'Admin1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password1')
        ]);

        User::factory(5)->create();


        // User::factory(3)->create();

        Category::create([
            'name' => 'Diproses',
            'slug' => 'diproses',
        ]);

        Category::create([
            'name' => 'Ditangani',
            'slug' => 'ditangani',
        ]);

        Category::create([
            'name' => 'Selesai',
            'slug' => 'selesai',
        ]);

        Category::create([
            'name' => 'Terkirim',
            'slug' => 'terkirim',
        ]);

        Post::factory(20)->create();

       
    }
}