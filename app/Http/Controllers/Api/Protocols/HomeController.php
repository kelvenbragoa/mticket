<?php

namespace App\Http\Controllers\Api\Protocols;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\SellDetails;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index($id){

        $event = Event::find($id);

        $all_tickets = SellDetails::where('event_id',$event->id)->count();
        $pending_tickets = SellDetails::where('event_id',$event->id)->where('status',1)->count();
        $done_tickets = SellDetails::where('event_id',$event->id)->where('status',0)->count();

        $array[] = array(
            'all_tickets' => $all_tickets,
            'pending_tickets' => $pending_tickets,
            'done_tickets' => $done_tickets,
        );

        return response([
            'home' => $array,
        ],200);

    }
}
