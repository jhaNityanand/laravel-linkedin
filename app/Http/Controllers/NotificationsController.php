<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $title = 'Notifications | LinkedIn';
        return view('notifications', compact('title'));
    }
} 