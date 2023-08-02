<?php

namespace App\Http\Controllers\Api\Protocols;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function index($id){

        $event = Event::find($id);

        $products = Ticket::where('event_id',$event->id)->orderBy('name','asc')->get();
        
        

        // $array[] = array(
        //     'all_tickets' => $all_tickets,
        // );

        return response([
            'products' => $products,
        ],200);

    }

    public function productdetail($id){
        

        

        return response([
            'product' => Ticket::where('id',$id)->get(),
        ],200);
    }
}
