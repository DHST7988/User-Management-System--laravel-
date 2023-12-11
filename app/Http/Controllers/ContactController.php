<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact_form');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'reason' => $request->input('reason'),
        ];

        Mail::to('daniel06074731@gmail.com')->send(new ContactMail($data));

        return redirect('/contact')->with('success', 'Email sent successfully!');
    }

    public function sendEmail2(Request $request)
    {
        Mail::to('daniel06074731@gmail.com')->send(new ContactMail($request));
        return redirect('/contact');
    }

}

