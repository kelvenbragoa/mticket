<?php

namespace App\Http\Controllers\Api\Barman;

use App\Http\Controllers\Controller;
use App\Models\CartBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //

    public function index($userid){
        
        return response([
    
            'cart' => CartBar::with('product:name,sell_price,id')->where('user_id',$userid)->where('sell_id',null)->get()
    
        ],200);
    
       }

    public function store(Request $request){

        $data = $request->all();
        if (CartBar::where('user_id',$data['user_id'] )->where('product_id',$data['product_id'])->where('sell_id',null)->where('event_id',$data['event_id'])->exists()) {
            $rec_data = CartBar::where('user_id',$data['user_id'] )->where('product_id',$data['product_id'])->where('sell_id',null)->first();
            $qtd = $rec_data->qtd + $data['qtd'];
            // dd($qtd);
            //  update($qtd,$rec_data->id );
            DB::table('cart_bars')
              ->where('id', $rec_data->id )
              ->update(['qtd' => $qtd]);

              return response([
                'message' => 'Foi acrescentada a quantidade do seu produto',
                
            ], 200);
        }else{

            CartBar::create([
                'user_id' => $data['user_id'],
                'product_id' => $data['product_id'],
                'event_id' => $data['event_id'],
                'qtd' => $data['qtd'],
                
            ]);
    
            return response([
            'message' => 'Produto adicionado com sucesso',
            
        ], 200);
        }
       }


    public function destroy($id,$userid){
        $cart = CartBar::find($id);

        if(!$cart)
        {
            return response([
                'message' => 'Produto não encontrado'
            ], 403);
        }

        if($cart->user_id != $userid)
        {
            return response([
                'message' => 'Permissão negada.'
            ], 403);

        }

      
        CartBar::destroy($id);

        return response([

            'message' => 'Produto apagado'
        ], 200);
        
    }
}
