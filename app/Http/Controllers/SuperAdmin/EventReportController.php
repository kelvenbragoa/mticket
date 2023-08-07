<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Sell;
use App\Models\SellDetails;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventReportController extends Controller
{
    //

    public function tickets_report($id){


        $event = Event::find($id);
        $tickets_local = Sell::where('event_id',$event->id)->where('user_id',0)->get();
        $tickets_online = Sell::where('event_id',$event->id)->where('user_id','!=',0)->get();
        $invites_online = Sell::where('event_id',$event->id)->where('user_id',55)->get();

        $tickets_local_true = SellDetails::where('event_id',$event->id)->where('user_id',0)->where('status',1)->get();
        $tickets_local_false = SellDetails::where('event_id',$event->id)->where('user_id',0)->where('status',0)->get();
        $tickets_online_true = SellDetails::where('event_id',$event->id)->where('user_id','!=',0)->where('status',1)->get();
        $tickets_online_false = SellDetails::where('event_id',$event->id)->where('user_id','!=',0)->where('status',0)->get();
        $invites_online_true = SellDetails::where('event_id',$event->id)->where('user_id',55)->where('status',1)->get();
        $invites_online_false = SellDetails::where('event_id',$event->id)->where('user_id',55)->where('status',0)->get();

        $tickets_local_amount = 0;

        foreach($tickets_local as $item){
            $tickets_local_amount =$tickets_local_amount + $item->qty*$item->price;
        }

   
        

        return view('superadmin.events.ticket-report',compact(
            'tickets_local',
            'tickets_online',
            'invites_online',
            'tickets_local_amount',
            'tickets_local_true',
            'tickets_local_false',
            'tickets_online_true',
            'tickets_online_false',
            'invites_online_true',
            'invites_online_false',
        
        ));
    }
}
