<?php

namespace App\Http\Controllers\Api\Protocols;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\SellDetails;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    //

    public function index($id){

        $event = Event::find($id);

        $all_tickets = SellDetails::where('event_id',$event->id)->with('event:id,name,start_date')->with('ticket:id,name,price')->with('user:id,name,mobile,email')->get();
        
        

        $array[] = array(
            'all_tickets' => $all_tickets,
        );

        return response([
            'all_tickets' => SellDetails::where('event_id',$event->id)->with('event:id,name,start_date')->with('ticket:id,name,price')->with('user:id,name,mobile,email')->with('sell')->with('sell.transaction')->orderBy('id','desc')->get(),
        ],200);

    }

    public function pending($id){
        $event = Event::find($id);

        $pending_tickets = SellDetails::where('event_id',$event->id)->where('status',1)->get();

        $array[] = array(
            'pending_tickets' => $pending_tickets,
        );

        return response([
            'pending_tickets' => SellDetails::where('event_id',$event->id)->with('event:id,name,start_date')->with('ticket:id,name,price')->with('user:id,name,mobile,email')->with('sell')->with('sell.transaction')->where('status',1)->orderBy('id','desc')->get(),
        ],200);

    }

    public function done($id){
        $event = Event::find($id);

        $done_tickets = SellDetails::where('event_id',$event->id)->where('status',0)->get();

        $array[] = array(
            'done_tickets' => $done_tickets,
        );

        return response([
            'done_tickets' => SellDetails::where('event_id',$event->id)->with('event:id,name,start_date')->with('ticket:id,name,price')->with('user:id,name,mobile,email')->with('sell')->with('sell.transaction')->where('status',0)->orderBy('id','desc')->get(),
        ],200);
    }

    public function ticketdetail($id){
        

        

        return response([
            'ticket' => SellDetails::where('id',$id)->with('event:id,name,start_date')->with('ticket:id,name,price')->with('user:id,name,mobile,email')->with('sell')->with('sell.transaction')->orderBy('id','desc')->get(),
        ],200);
    }


    public function verifyticket($id){
        $ticket = SellDetails::find($id);


        $ticket->update([
            'status'=>0
        ]);

        return response([

            'message' => 'Bilhete Verificado Com sucesso'
        ], 200);
    }

    public function status($id){
        $ticket = SellDetails::find($id);

        return response([

            'status' => $ticket->status
        ], 200);

    }



    
}
