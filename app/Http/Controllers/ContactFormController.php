<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function postMessage(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|min:8',
                'name' => 'required|max:50|min:5',
                'message' => 'required|max:150',
            ],
            [
                'email.required' => 'Az e-mail megadása kötelező.',
                'email.email' => 'Kérlek, érvényes e-mail címet adj meg.',
                'name.required' => 'A név megadása kötelező.',
                'name.max' => 'A név legfeljebb 50 karakter lehet.',
                'name.min' => 'A név legalább 5 karakter kell legyen.',
                'message.required' => 'Írj be egy üzenetet!',
                'message.max' => 'Az üzenet legfeljebb 150 karakter lehet.',
            ],
        );

        $msg = new Message;
        $msg->sender_name = $request->name;
        $msg->sender_email = $request->email;
        $msg->content = $request->message;
        $msg->save();

        return redirect()
            ->route('contact')
            ->with('success', true);
    }
}
