<?php

namespace App\Http\Controllers\Api\Barman;

use App\Http\Controllers\Controller;
use App\Models\CartBar;
use App\Models\SellBar;
use App\Models\SellDetailBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{

  
    //
    public function index($userid){
        

        return response([
            'sells' => SellBar::where('user_id',$userid)->orderBy('created_at', 'desc')->get()
        ],200);

    }




    public function store(Request $request){

        $data = $request->all();

        if($data['total'] == 0){
            return response([
                'message' => 'Nenhuma venda efetuada.',
            ],403);
        }

        $id = SellBar::create([
            'user_id' => $data['user_id'],
            'total' => $data['total'],
            'method' => $data['method'],
            'ref' => $data['ref'],
            'status' => 1,
            'event_id' => $data['event_id'],
          
        ])->id;

        // dd($id);
        // OBTEM TODO CARRINHO NULO
        // $mycart = DB::table('cart_bars')->where('user_id', $data['user_id'] )->where('sell_id',null)->get();

        $mycart = CartBar::where('user_id', $data['user_id'] )->where('sell_id',null)->get();
        
        // ADICIONA TODO CARRINHO NULO A VENDA
        foreach ($mycart as $item){

            SellDetailBar::create([
                'sell_id' => $id,
                'user_id' => $data['user_id'],
                'event_id' => $data['event_id'],
                'product_id' => $item->product_id,
                'status' => 1,
                'qtd' => $item->qtd,
                'price' => $item->product->sell_price,
               
                'total' => $item->qtd*$item->product->sell_price,
            ]);
        }

        foreach ($mycart as $item){

           
            $item->delete();
        }
        // //Update
        // // dd($id);
        // // ATRIBUI VENDA A CARRINHO NULO
        // DB::table('carts')->where('user_id', $data['user_id'] )->where('sell_id',null)->update(['sell_id' => $id]);
       


        return response([
            'message' => 'Sua ordem foi efectuada com sucesso. Va até a  Minhas Vendas para visualizar.',
        ],200);
    }



    public function selldetails($id){
        return response([
            'selldetail' => SellDetailBar::where('sell_id',$id)->with('product:id,name')->with('sell:id,method,total,status')->get(),
        ],200);
    }


    public function verifyreceipt($id,$userid){
        $ticket = SellBar::find($id);


        $ticket->update([
            'status'=>0,
            'verified_by'=>$userid
        ]);

        return response([

            'message' => 'Recibo Verificado Com sucesso'
        ], 200);
    }
}
