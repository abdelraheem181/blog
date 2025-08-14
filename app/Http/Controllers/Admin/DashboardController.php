<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
       
        // count of data for the pages
        
        $data['authors_count']     = Author::count();
        $data['posts_count']       = Post::count();
        $data['categories_count']  = Category::count();
        $data['contact_count']     = Contact::count();
        $data['latest_posts']      = Post::latest()->take(5)->get();
        $data['latest_authors']    = Author::latest()->take(5)->get();
        $data['latest_categories'] = Category::latest()->take(5)->get();
        $data['latest_contacts']   = Contact::latest()->take(5)->get();
        $data['users_count']      = User::count(); // Assuming you have a User model
        $data['about'] = About::first(); // Assuming you have an About model
        $data['post'] = Post::all(); // Fetch all posts for the dashboard

        return view('admin.dashboard', $data);
    }
}
