<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    public function index()
    {
        return view('feedbacks.index');
    }
}
