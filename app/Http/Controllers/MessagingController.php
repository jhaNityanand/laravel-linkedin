<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagingController extends Controller
{
    public function index()
    {
        $title = 'Messaging | LinkedIn';
        return view('messaging', compact('title'));
    }
} 