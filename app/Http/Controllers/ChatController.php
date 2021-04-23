<?php

namespace App\Http\Controllers;

use App\Events\SendMessageEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('layouts.app', [
            "header" => 'Chat Box',
            "component" => 'chat-box',
            "data" => [
                'send_link' => route('chat.store'),
                'line_id' => ''
            ]
        ]);
    }

    public function store(Request $request)
    {
        broadcast(new SendMessageEvent($request->input()))->toOthers();
    }
}
