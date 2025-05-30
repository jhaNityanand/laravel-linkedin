<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        $title = 'Jobs | LinkedIn';
        return view('jobs', compact('title'));
    }
} 