<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        User::truncate();
        Post::truncate();
        $user = User::factory()->create();

        $cat1 = Category::create(['name' => 'personal', 'slug' => 'personal']);
        $cat2 = Category::create(['name' => 'work', 'slug' => 'work']);
        $cat3 = Category::create(['name' => 'fun', 'slug' => 'fun']);

        // $post1 = Post::create([
        //     'title' => 'Naslov1',
        //     'excerpt' => 'Lorem ipsum dolor sit amet.',
        //     'slug' => 'slug1',
        //     'body' => 'Lorem ipsum, dolor sit amet',
        //     'user_id' => $user->id,
        //     'category_id' => $cat1->id
        // ]);
        // $post2 = Post::create([
        //     'title' => 'Naslov2',
        //     'excerpt' => 'Lorem ipsum dolor sit amet.',
        //     'slug' => 'slug2',
        //     'body' => 'Lorem ipsum, dolor sit amet',
        //     'user_id' => $user->id,
        //     'category_id' => $cat2->id
        // ]);
        // $post2 = Post::create([
        //     'title' => 'Naslov3',
        //     'excerpt' => 'Lorem ipsum dolor sit amet.',
        //     'slug' => 'slug3',
        //     'body' => 'Lorem ipsum, dolor sit amet',
        //     'user_id' => $user->id,
        //     'category_id' => $cat3->id
        // ]);
    }
}
