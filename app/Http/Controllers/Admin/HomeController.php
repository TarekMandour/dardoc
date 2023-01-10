<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class HomeController extends Controller
{

    public function index()
    {    
        return view('admin.dashboard'); 
    }

    public function page()
    {
        return view('admin.page'); 
    }
    
}
