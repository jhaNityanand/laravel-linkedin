<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home | LinkedIn';
        return view('home', compact('title'));
    }
} 