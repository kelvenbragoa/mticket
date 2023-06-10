<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
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
            $categories= Category::orderBy('name','asc')->get();

            $events= Event::where('status_id',2)->orderBy('id','desc')->get();
            return view('welcome',compact('categories','events'));

        }

        if(Auth::user()->role->name == "protocol"){

            return view('protocol.index');
        }
    }
}
