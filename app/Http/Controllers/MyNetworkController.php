<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyNetworkController extends Controller
{
    public function index()
    {
        $title = 'Network | LinkedIn';
        return view('mynetwork', compact('title'));
    }
}
