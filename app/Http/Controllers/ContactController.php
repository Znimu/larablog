<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    function index() {
        return view('contact');
    }

    function store(ContactRequest $request) {
        $contact = new \App\Contact;
        $contact->contact_name = $request->contact_name;
        $contact->contact_email = $request->contact_email;
        $contact->contact_message = $request->contact_message;
        $contact->contact_date = \Carbon\Carbon::now();
        $contact->save();

        return redirect('/contact/confirm');
    }

    function confirm() {
        return view('confirm');
    }

    function contacts() {
        $contacts = \App\Contact::all()->sortByDesc('id');

        return view('contacts', [
            'contacts' => $contacts
        ]);
    }
}
