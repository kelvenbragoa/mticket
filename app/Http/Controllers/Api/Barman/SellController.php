<?php

namespace App\Http\Controllers\Api\Barman;

use App\Http\Controllers\Controller;
use App\Models\Barman;
use App\Models\CardTransaction;
use App\Models\CartBar;
use App\Models\EventCard;
use App\Models\Products;
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

        $last_sell = SellBar::where('user_id',$data['user_id'])->where('event_id',$data['event_id'])->where('total',$data['total'])->where('method',$data['method'])->orderBy('id','desc')->first();

        if($last_sell != null){

            $seconds = now()->diffInSeconds($last_sell->created_at);

            if($seconds < 15){
                return response([
                    'message' => 'Verifique as suas vendas.',
                ],200);
            }

        }

        $mycartverfify = CartBar::where('user_id', $data['user_id'] )->where('sell_id',null)->get();

        $products_out_of_stock = 0;

        foreach($mycartverfify as $item){
            $product = Products::find($item->product_id);

            if($item->qtd > $product->qtd){
                $products_out_of_stock = $products_out_of_stock + 1;
            }


        }


        if($products_out_of_stock > 0){
            return response([
                'message' => 'Venda não concluída. Existem '.$products_out_of_stock.' que já está sem Estoque. Apague os produtos e volta a adicionar.',
            ],200);
            
        }else{

        if($data['method'] == 'cashless'){

            $card = EventCard::find($data['card_id']);

            $balance_remain = $card->balance - $data['total'];

            if($data['total']>$card->balance){
                return response([
                    'message' => 'Venda não concluída. Saldo insuficiente no cartão',
                ],200);
            }else{
                $card->update([
                    'balance'=>$balance_remain
                ]);
    
                CardTransaction::create([
                    'card_id'=>$card->id,
                    'event_card_id'=>$card->id,
                    'sell_id'=>0,
                    'total'=>$data['total'],
                    'balance'=>$balance_remain,
                    'type_of_transaction_id'=>1,
                ]);
            }
           
        }



        $id = SellBar::create([
            'user_id' => $data['user_id'],
            'total' => $data['total'],
            'method' => $data['method'],
            'ref' => $data['ref'],
            'status' => 1,
            'event_id' => $data['event_id'],
            'bar_store_id' => $data['bar_store_id'],
        ])->id;

        // dd($id);
        // OBTEM TODO CARRINHO NULO
        // $mycart = DB::table('cart_bars')->where('user_id', $data['user_id'] )->where('sell_id',null)->get();

        $mycart = CartBar::where('user_id', $data['user_id'] )->where('sell_id',null)->get();
        
        // ADICIONA TODO CARRINHO NULO A VENDA
        foreach ($mycart as $item){

            $product_delete_qtd = Products::find($item->product_id);
            
            SellDetailBar::create([
                'sell_id' => $id,
                'user_id' => $data['user_id'],
                'event_id' => $data['event_id'],
                'product_id' => $item->product_id,
                'status' => 1,
                'qtd' => $item->qtd,
                'price' => $item->product->sell_price,
                'total' => $item->qtd*$item->product->sell_price,
                'bar_store_id'=>$data['bar_store_id']
            ]);

            $product_delete_qtd->update([
                'qtd'=>$product_delete_qtd->qtd - $item->qtd
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

    public function status($id){
        $sellbar = SellBar::find($id);

        return response([

            'status' => $sellbar->status
        ], 200);

    }



    public function destroy($id,$userid){
        $sell = SellBar::find($id);

        if(!$sell)
        {
            return response([
                'message' => 'Venda não encontrada'
            ], 403);
        }

        if($sell->user_id != $userid)
        {
            return response([
                'message' => 'Permissão negada.'
            ], 403);
        }

        $sellbardetail = SellDetailBar::where('sell_id',$id)->get();

        foreach($sellbardetail as $item){
            $product_to_increase_qtd = Products::find($item->product_id);

            $product_to_increase_qtd->update([
                'qtd'=>$product_to_increase_qtd->qtd+$item->qtd
            ]);
            
            $item->delete();
        }



      
        SellBar::destroy($id);

        return response([

            'message' => 'Venda apagada com sucesso!'
        ], 200);
    }



    public function operation($id){

        $barman = Barman::find($id);
        $sells_verified  = SellBar::where('verified_by',$id)->get();
        $sells_made  = SellBar::where('user_id',$id)->get();

        $sells_made_dinheiro  = SellBar::where('user_id',$id)->where('method','dinheiro')->get();
        $sells_made_cartao  = SellBar::where('user_id',$id)->where('method','cartao')->get();
        $sells_made_mpesa  = SellBar::where('user_id',$id)->where('method','mpesa')->get();
        $sells_made_emola  = SellBar::where('user_id',$id)->where('method','emola')->get();
        $sells_made_cashless  = SellBar::where('user_id',$id)->where('method','cashless')->get();




        $array[] = array(
            'sell_made' => $sells_made->count(),
            'sell_verified' => $sells_verified->count(),
            'amount_sell_made' => $sells_made->sum('total'),
            'amount_sell_verified'=>$sells_verified->sum('total'),
            'amount_sell_dinheiro'=>$sells_made_dinheiro->sum('total'),
            'amount_sell_cartao'=>$sells_made_cartao->sum('total'),
            'amount_sell_mpesa'=>$sells_made_mpesa->sum('total'),
            'amount_sell_emola'=>$sells_made_emola->sum('total'),
            'amount_sell_cashless'=>$sells_made_cashless->sum('total'),
        );

        return response([
            'operation' => $array,
        ],200); 
    }
}
