<?php

namespace App\Http\Controllers\Api\Barman;

use App\Http\Controllers\Controller;
use App\Models\BarStore;
use App\Models\Event;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function index($id,$bar_store_id){

        $event = Event::find($id);
        $bar_store = BarStore::find($bar_store_id);

        $products = Products::where('event_id',$event->id)->where('bar_store_id',$bar_store->id)->with('barstore')->orderBy('name','asc')->get();
        
        

        // $array[] = array(
        //     'all_tickets' => $all_tickets,
        // );

        return response([
            'products' => $products,
        ],200);

    }

    public function productdetail($id){
        

        

        return response([
            'product' => Products::where('id',$id)->with('barstore')->get(),
        ],200);
    }
}
