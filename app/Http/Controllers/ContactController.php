<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'service_type' => 'nullable|string',
            'message' => 'required|string',
        ]);

        Inquiry::create($validated);

        // Optionally send mail
        // Mail::to('haqtasnim21@gmail.com')->send(new \App\Mail\NewInquiry($validated));

        return back()->with('success', 'Your inquiry has been sent successfully! We will contact you soon.');
    }
}
