<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Sell;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function checkout(Event $event){

        // $event = Event::find($id);

        $tickets = Ticket::where('event_id',$event->id)->get();

        return view('frontend.event-checkout',compact('event','tickets'));

     }
    public function index()
    {
        //
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
        $data = $request->all();


        $tickets = Sell::where('user_id',Auth::user()->id)->where('event_id',$data['event_id'])->get();
        $event = Event::find($data['event_id']);

        // $total = 0;

        // foreach($tickets as $item){
        //     $total = $total + $item->ticket->price;
        // }

        $qty = 0;
        for ($i=0; $i < count($data['quantity']) ; $i++) { 
            $qty = $qty + $data['quantity'][$i];
        }

        if($qty == 0){
            return back()->with('message','Nenhum Bilhete selecionado');
        }else{

            for ($i=0; $i < count($data['quantity']) ; $i++) { 
           
                if($data['quantity'][$i] != 0){
                    Sell::create([
                        'user_id'=>Auth::user()->id,
                        'event_id'=>$data['event_id'],
                        'ticket_id'=>$data['ticket_id'][$i],
                        'qty'=>$data['quantity'][$i],
                        'price'=>$data['price'][$i],
                        'total'=>$data['price'][$i]*$data['quantity'][$i],
                        'status'=>0
                    ]);
                }
    
            }
            
            
    
    
            return view('frontend.event-compra-finalizada',compact('tickets','event','total'));

        }

        
        

        
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
