<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\SellBar;
use App\Models\SellDetailBar;
use App\Models\SellDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        
        return view('user.dashboard.bar',compact('events'));
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
        $event = Event::find($id);
        $sells_bar_count = SellBar::where('event_id',$id)->get();
        $sells_bar = SellBar::where('event_id',$id)->paginate(10);
        $sell_bar_details= SellDetailBar::where('event_id',$id)->get();
        return view('user.dashboard.ver-bar',compact('sells_bar','event','sell_bar_details','sells_bar_count'));
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

    public function bar_report($event_id){

        $event = Event::find($event_id);
        $investment = 0;

        foreach($event->products as $item){
            $investment = $investment + $item->qtd*$item->buy_price;
        }
      

      
       
        $pdf = Pdf::loadView('superadmin.events.report', compact('event','investment'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->setPaper('a4')->stream('invoice.pdf');


    }
}
