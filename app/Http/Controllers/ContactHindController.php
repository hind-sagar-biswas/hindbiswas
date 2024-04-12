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

        $lastContactMail = ContactHind::where('user_id', auth()->id())->orWhere('remote_addr', $data['remote_addr'])->orderBy('created_at', 'desc')?->first();
        if ($lastContactMail && now()->diffInMinutes($lastContactMail->created_at) < 5) {
            return view('contact_output', ['title' => 'Too soon!', 'message' => 'Please wait 5 minutes before sending another message.']);
        }

        $contactMessage = ContactHind::create($data);
        Mail::send(new MailContactHind($contactMessage));

        return view('contact_output', ['title' => 'Success!', 'message' => 'Message sent successfully!']);
    }
}
