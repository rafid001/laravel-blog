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

        User::truncate();
        Category::truncate();

        $user = User::factory()->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'title' => 'my work post',
            'excerpt' => 'lorem 1',
            'slug' => 'my-work-post',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum eos minus commodi praesentium animi. Quisquam, totam ipsam provident non labore amet sunt quidem molestias iure maxime excepturi magnam ab, dolorem porro cumque et delectus repudiandae. Dolore molestiae iure consectetur! Ab commodi itaque sint dignissimos deserunt, expedita possimus sapiente quia sed',
        ]);
    }
}
