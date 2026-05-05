<?php

namespace App\Http\Controllers;

use App\Mail\ContactSubmitted;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $data['subject'] = 'Portfolio Contact';

        $contact = Contact::create($data);

        try {
            Mail::mailer(config('mail.contact_notification.mailer'))
                ->to(config('mail.contact_notification.address'))
                ->send(new ContactSubmitted($contact));
        } catch (Throwable $exception) {
            report($exception);

            return redirect()
                ->to(route('portfolio') . '#contact')
                ->with('warning', 'Your message was saved, but the Gmail notification could not be sent. Please check the mail settings.');
        }

        return redirect()
            ->to(route('portfolio') . '#contact')
            ->with('success', 'Your message has been sent successfully.');
    }
}
