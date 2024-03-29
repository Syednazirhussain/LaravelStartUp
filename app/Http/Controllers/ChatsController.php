<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }


    public function index() {

        return view('chats.index');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

        broadcast(new MessageSent($message->load('user')))->toOthers();

        return ['status' => 'success'];
    }
    

}
