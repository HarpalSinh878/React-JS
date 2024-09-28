<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('orders');
        //return view('home');
    }


    public function designView()
    {
        return view('design');
    }
    public function privacy_policy(){
        echo system_setting('privacy_policy');
    }

    public function contact_us(){
        echo "<b>Company Name</b> : ".system_setting('company_name');
        // echo "<br><b>Company Website</b> : ".system_setting('company_website');
        echo "<br><b>Company Email</b> : ".system_setting('company_email');
        echo "<br><b>Company Contact </b> : ".system_setting('company_tel1')." , ".system_setting('company_tel2');
       
    }

}
