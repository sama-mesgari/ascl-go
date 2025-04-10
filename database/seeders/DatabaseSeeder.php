<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Post;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@me.com',
            'password' => bcrypt('123123'),
        ]);

        Post::factory()->count(10)->create();
        Campaign::factory()->count(10)->create();
    }
}
