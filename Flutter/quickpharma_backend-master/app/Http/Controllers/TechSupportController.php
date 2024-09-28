<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechSupportController extends Controller
{
    public function index()
    {
        return view('tech-support');
    }
}
