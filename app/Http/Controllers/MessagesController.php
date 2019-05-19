<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;


class MessagesController extends Controller
{
    public function messages() {
        $messages = message::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.messages')->with('messages', $messages);
    }
}
