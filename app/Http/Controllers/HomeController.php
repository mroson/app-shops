<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Show the homepage (index page)
    public function index()
    {
        return view('home'); // You can change this to any view you want to show
    }
    //
    
}
