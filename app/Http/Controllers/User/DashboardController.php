<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
        // $approved_events_count = count(Event::where('user_id',Auth::user()->id)->where('status_id',2)->get());
        // $pending_events_count = count(Event::where('user_id',Auth::user()->id)->where('status_id',3)->get());
        // $canceled_events_count = count(Event::where('user_id',Auth::user()->id)->where('status_id',1)->get());

        $approved_events_count = Cache::remember('count.events.approved.'.$user->id, now()->addSeconds(30),function() use ($user){
            return count(Event::where('user_id',Auth::user()->id)->where('status_id',2)->get());
        });

        $pending_events_count = Cache::remember('count.events.pending.'.$user->id, now()->addSeconds(30),function() use ($user){
            return count(Event::where('user_id',Auth::user()->id)->where('status_id',3)->get());
        });

        $canceled_events_count = Cache::remember('count.events.canceled.'.$user->id, now()->addSeconds(30),function() use ($user){
            return count(Event::where('user_id',Auth::user()->id)->where('status_id',1)->get());
        });


        $recent_events = Event::where('user_id',Auth::user()->id)->limit(5)->get();
        return view('user.dashboard.index',compact('approved_events_count','pending_events_count','canceled_events_count', 'recent_events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
