<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $myticket = Sell::where('user_id',Auth::user()->id)->get();
        

      
        return view('frontend.meusbilhetes',compact('myticket'));
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

        $cart = Carts::where('user_id',Auth::user()->id)->get();
        foreach($cart as $item){
            Sell::create([
                'user_id'=>Auth::user()->id,
                'event_id'=>$item->event_id,
                'ticket_id'=>$item->ticket_id,
                'qty'=>$item->qtd,
                'price'=>$item->ticket->price,
                'total'=>$item->ticket->price,
                'status'=>1

            ]);
        }

        foreach($cart as $item){
            $item->delete();
        }



        return redirect()->route('meusbilhetes.index');
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
        $sell = Sell::find($id);

        return view('frontend.ticket',compact('sell'));
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
