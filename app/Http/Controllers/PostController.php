<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Logic to retrieve posts from the database
      
        $posts = \App\Models\Post::where('is_published', true)->take(5)->get();
        
        // Assuming you have a Post model
        return view('website.index', compact('posts')); // Adjust the view path as necessary
    }
    /**
     * Display a specific post.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Logic to retrieve a specific post by ID
     
        $post = \App\Models\Post::findOrFail($id);
        $view = $post->increment('views'); // Increment the view count
        return view('website.show', compact('post', 'view')); // Adjust the view path as necessary
    }
}
