<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use App\Http\Requests\StorePostPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(4);

        return view('dashboard.post.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.create', ['post'=> new Post(), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        // return "Hello ". $request-><Nombre del campo>; ESTA ES LA FORMA INDICADA EN LA DOCUMENTACION OFICIAL
        // return "Hello ". $request->input('title');
        // dd($request->validated());
        // return "Hello " .request("title"); 
        
        // $request->validate([
        //     'title' => 'required|min:5|max:500',
        //     // 'url_clean' => 'required|min:5|max:500',
        //     'content' => 'required|min:5',
        // ]);
        Post::create($request->validated());
        return back()->with('status', 'Post Creado con Exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {
        $post->update($request->validated());
        return back()->with('status', 'Post Editado con Exito!');
    }

    public function image(Request $request, Post $post)
    {
        // $post->update($request->validated());
        // return back()->with('status', 'Post Editado con Exito!');
        $request->validate([
            'image' => 'required|mimes:jpg,bmp,png,svg|max:10240'
        ]);

        $filename = time() . "." . $request->image->extension();

        $request->image->move(public_path('images'), $filename);
        
        PostImage::create(['post_id' => $post->id, 'image' => $filename]);
        return back()->with('status', 'Imagen Cargada con Exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status', 'Post Eliminado con Exito!');
    }
}
