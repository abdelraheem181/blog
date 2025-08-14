<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = session()->get('locale', 'ar');
        $authors = Author::all();
        return view('admin.author.index', compact('authors','locale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locale = session()->get('locale', 'ar');
        return view('admin.author.create',compact('locale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $locale = session()->get('locale', 'ar');
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
            'phone_no' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'social_links' => 'nullable|string|max:255', // Assuming this is a string
        ]);

        if ($request->hasFile('profile_picture')) {
            $imageName = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_picture'), $imageName);
            $path = 'profile_picture/' . $imageName; // Store the path relative to public directory
            $validatedData['profile_picture'] = $path;
        }

        Author::create($validatedData);

        return redirect()->route('admin.authors.index',['locale'=>$locale])->with('success', 'تم إضافة المؤلف بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $auther)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        $locale = session()->get('locale', 'ar');
        return view('admin.author.edit', compact('author','locale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $locale = session()->get('locale', 'ar');
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,'.$author->id,
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_no' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'social_links' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('profile_picture')) {
            $imageName = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_picture'), $imageName);
            $path = 'profile_picture/' . $imageName;
            $validatedData['profile_picture'] = $path;
        }

        $author->update($validatedData);

        return redirect()->route('admin.authors.index',['locale'=>$locale])->with('success', 'تم تحديث بيانات المؤلف بنجاح.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $locale = session()->get('locale', 'ar');
        if ($author->profile_picture && file_exists(public_path($author->profile_picture))) {
            unlink(public_path($author->profile_picture)); // Delete the profile picture file
        }

        $author->delete();

        return redirect()->route('admin.authors.index',['locale'=>$locale])->with('success', 'تم حذف المؤلف بنجاح.');
    }
}
