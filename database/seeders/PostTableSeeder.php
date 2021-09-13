<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        $categories = Category::all();

        foreach($categories as $key => $c){
            for($i =1; $i<6; $i++) {
                Post::create([
                    'title' => "Post $i $key",
                    'url_clean' => "post-$i-$key",
                    'content' => "Contenido algo vacano ahi para variar $i",
                    'category_id' => $c->id,
                ]);
            }
        }
    }
}
