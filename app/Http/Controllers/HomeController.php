<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role->name == "superadmin"){

            return view('superadmin.index');

        }

        if(Auth::user()->role->name == "user"){
            return view('user.index');

        }

        if(Auth::user()->role->name == "protocol"){

            return view('protocol.index');
        }
    }
}
