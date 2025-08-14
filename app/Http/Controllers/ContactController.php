<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    /**
     * Display the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Return the view for the contact form
        $locale = session()->get('locale', 'ar');   
        $contacts = Contact::all(); // Fetch all contacts if needed
        return view('admin.contact.index', compact('contacts','locale')); // Adjust the view path as necessary
    }

    /**
     * Handle the contact form submission.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Logic to handle form submission, e.g., sending an email
        $locale = session()->get('locale', 'ar');
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_no' => 'required|string|max:20',
            'message' => 'required|string|max:500',
        ]);
        // Here you would typically send an email or save the contact message to the database
        Contact::create($request->all());
         
        return redirect()->route('home.contact.index',['locale'=>$locale])->with('success', 'Your message has been sent successfully!');
    }

    /**
     * Display the specified contact message.
     *
     * @param Contact $contact
     * @return \Illuminate\View\View
     */
    public function show(Contact $contact)
    {
        // Return the view for displaying a specific contact message
        $locale = session()->get('locale', 'ar');
        return view('website.contact', compact('contact','locale')); // Adjust the view path as necessary 

    }
    /**
     * Remove the specified contact message from storage.
     *
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact)
    {
        // Logic to delete the contact message
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Contact message deleted successfully!');
    }
}
