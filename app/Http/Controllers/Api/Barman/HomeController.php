<?php

namespace App\Http\Controllers\Api\Barman;

use App\Http\Controllers\Controller;
use App\Models\Barman;
use App\Models\CartBar;
use App\Models\Event;
use App\Models\Products;
use App\Models\SellDetailBar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index($id){

        $user = Barman::find($id);

        $products = Products::where('event_id',$user->event_id)->sum('qtd');
        $carts = CartBar::where('user_id',$user->id)->where('event_id',$user->event_id)->sum('qtd');
        $sells = SellDetailBar::where('user_id',$user->id)->where('event_id',$user->event_id)->sum('qtd');

        $products_int = $products;
        $carts_int = $carts;
        $sells_int = $sells;

        $array[] = array(
            'products' => intval($products_int),
            'carts' => intval($carts_int),
            'sells' => intval($sells_int),
        );

        return response([
            'home' => $array,
        ],200);

    }
}
