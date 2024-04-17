<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $user = User::factory()->create([
            'name' => 'Rafid Hasan'
        ]);

        $user2 = User::factory()->create([
            'name' => 'hasan'
        ]);

        Post::factory(3)->create([
            'user_id' => $user->id
        ]);

        Post::factory(2)->create([
            'user_id' => $user2->id
        ]);
    }
}
