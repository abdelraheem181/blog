<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($id)
    {
        $author = Author::with(['posts' => function($query) {
            $query->where('is_published', 1)->orderBy('published_at', 'desc');
        }])->findOrFail($id);
        
        return view('website.author', compact('author'));
    }
}
