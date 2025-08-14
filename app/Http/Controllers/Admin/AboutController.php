<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    { 
        $locale = session()->get('locale', 'ar');
        $about = About::first();
        return view('admin.about.index', compact('about','locale'));
    }

    public function create()
    {
        $locale = session()->get('locale', 'ar');
        return view('admin.about.create',compact('locale'));
    }

    public function store(Request $request)
    {
        $locale = session()->get('locale', 'ar');
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        About::create($data);
        return redirect()->route('admin.abouts.index',['locale'=>$locale])->with('success', 'About section created successfully.');
    }

    public function edit(About $about)
    {
        $locale = session()->get('locale', 'ar');
        return view('admin.about.edit', compact('about','locale'));
    }

    public function update(Request $request, About $about)
    {
        $locale = session()->get('locale', 'ar');
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $about->update($data);
        return redirect()->route('admin.abouts.index',['locale'=>$locale])->with('success', 'About section updated successfully.');
    }

    public function destroy(About $about)
    {
        $locale = session()->get('locale', 'ar');
        $about->delete();
        return redirect()->route('admin.abouts.index',['locale'=>$locale])->with('success', 'About section deleted successfully.');
    }
}
