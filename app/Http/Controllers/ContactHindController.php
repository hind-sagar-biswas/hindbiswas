<?php

namespace App\Http\Controllers;

use App\Mail\ContactHind as MailContactHind;
use App\Models\ContactHind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactHindController extends Controller
{
    public function contact(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|min:10|max:255',
            'body' => 'required|min:20',
        ]);

        $data['user_id'] = auth()->id();
        $data['remote_addr'] = $request->ip();
        $data['http_x_forwarded_for'] = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? null;

        $contactMessage = ContactHind::create($data);
        Mail::send(new MailContactHind($contactMessage));

        return redirect('/')->with('success', 'Your message has been sent!');
    }
}
