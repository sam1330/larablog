<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends ApiResponseController
{
    public function index()
    {
        $posts = Post::
        join('post_images', 'posts.id', '=', 'post_images.post_id')->
        join('categories', 'posts.category_id', '=', 'categories.id')->
        select('posts.*', 'categories.title as category', 'post_images.image')->
        orderBy('posts.created_at', "desc")->paginate(10);
        return $this->successResponse($posts);
    }
    public function show(Post $post)
    {
        $post->image;
        $post->category;
        return $this->successResponse($post);
    }

    public function url_clean(String $url_clean)
    {
        $post = Post::where('url_clean', $url_clean)->firstOrFail();
        $post->image;
        $post->category;
        return $this->successResponse($post);
    }
   
    public function category(Category $category)
    {
        return $this->successResponse(["posts" => $category->post()->paginate(5), "category" => $category]);
    }
}
