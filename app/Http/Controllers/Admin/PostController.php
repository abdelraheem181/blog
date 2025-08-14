<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $posts = Post::with('author', 'category')->get();
        return view('admin.post.index', compact('posts'));
    }

    public function approve(Post $post)
    {
       
        $post->update([
            'is_published' => true
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post Approved successfully.'); 
    }

    public function unapprove(Post $post)
    {
       
        $post->update([
            'is_published' => false
        ]);
        
        return redirect()->route('admin.posts.index')->with('success', 'Post unapproved successfully.'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
       
        $categories = \App\Models\Category::all(); // Assuming you have a Category model
        $authors = \App\Models\Author::all(); // Assuming you have an Author model
        return view('admin.post.create', compact('categories', 'authors'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
            $validatedData = $request->validate([
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'ar_content' => 'required|string',
            'en_content' => 'required|string',
            'slug' => 'required|string|unique:posts,slug',
            'author_id' => 'nullable|exists:authors,id',
            'category_id' => 'nullable|exists:categories,id',
            'image_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'views' => 'integer|min:0'
      
        ]);

      

    if ($request->hasFile('image_cover')) {
            $imageName = time().'.'.$request->image_cover->extension();
            $request->image_cover->move(public_path('image_cover'), $imageName);
            $path = 'image_cover/' . $imageName;
            $validatedData['image_cover'] = $path;
        }

        $validatedData['title'] = [
            'en' => $validatedData['en_title'],
            'ar' => $validatedData['ar_title'],
        ];
        $validatedData['content'] = [
            'en' => $validatedData['en_content'],
            'ar' => $validatedData['ar_content'],
        ];

        Post::create($validatedData);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');   
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
       
        $post = Post::find($post->id);
        $view = $post->increment('views'); // Increment the view count
        return view('admin.post.show', compact('post', 'view'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
       
        $categories = \App\Models\Category::all(); // Assuming you have a Category model
        $authors = \App\Models\Author::all(); // Assuming you have an Author model
        return view('admin.post.edit', compact('post', 'categories', 'authors'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
       
        $validatedData = $request->validate([
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'ar_content' => 'required|string',
            'en_content' => 'required|string',
            'slug' => 'required|string|unique:posts,slug,' . $post->id,
            'author_id' => 'nullable|exists:authors,id',
            'category_id' => 'nullable|exists:categories,id',
            'image_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'views' => 'integer|min:0'
        ]);
     //   dd($validatedData);
        if ($request->hasFile('image_cover')) {
            $imageName = time().'.'.$request->image_cover->extension();
            $request->image_cover->move(public_path('image_cover'), $imageName);
            $path = 'image_cover/' . $imageName; // Store the path relative to public directory
         $validatedData['image_cover'] = $path;
        }

        $validatedData['title'] = [
            'en' => $validatedData['en_title'],
            'ar' => $validatedData['ar_title'],
        ];
        $validatedData['content'] = [
            'en' => $validatedData['en_content'],
            'ar' => $validatedData['ar_content'],
        ];

        $post->update($validatedData);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');   

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
