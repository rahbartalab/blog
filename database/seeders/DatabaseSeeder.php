<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
        User::factory(10)->create();
        $categories = Category::factory(4)->create();
        $tags = Tag::factory(20)->create();

        /* --!> create posts & add some relation <!-- */
        Post::factory(10)->create()->each(function (Post $post) use ($tags, $categories) {
            $post->tags()->attach($tags->random(3));
            $post->categories()->attach($categories->random(2));
        });
        Comment::factory(10)->create();
    }
}
