<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessageController extends Controller
{
    public function read()
    {
        $messages = Message::orderByDesc('created_at')->get();

        return view('messages', compact('messages'));
    }
}
