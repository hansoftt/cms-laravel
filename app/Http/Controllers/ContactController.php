<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Settings\ContactSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function contact(Request $request, ContactSettings $settings)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:25',
            'subject' => 'required',
            'message' => 'required|min:5',
        ]);

        Mail::to($settings->email)->send(new ContactMail($data));

        return redirect('/contact#contact')->with('success', 'Your message has been sent successfully!!!');
    }

}
