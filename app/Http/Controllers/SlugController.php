<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class SlugController extends Controller
{
    //
    public function index(){
        $events = Event::all();
        
        foreach($events as $event){
            $event->generateSlug();
            $event->save();
        }
    }
}
