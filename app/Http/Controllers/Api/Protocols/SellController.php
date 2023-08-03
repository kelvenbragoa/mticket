<?php

namespace App\Http\Controllers\Api\Protocols;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Sell;
use App\Models\SellDetails;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SellController extends Controller
{
    //
    public function index($userid){
        

        return response([
            'sells' => Sell::with('ticket:id,name')->with('user')->where('protocol_id',$userid)->orderBy('id', 'desc')->get()
        ],200);

    }

    public function store(Request $request){

        $data = $request->all();
        if($data['total'] == 0){
            return response([
                'message' => 'Nenhuma venda efetuada.',
            ],403);
        }

        $cart = Carts::where('protocol_id',$data['protocol_id'])->get();
        $ref = $data['protocol_id'].'-'.$data['method'];

        foreach($cart as $item){
            $sell = Sell::create([
                'user_id'=>0,
                'protocol_id'=>$data['protocol_id'],
                'event_id'=>$item->event_id,
                'ticket_id'=>$item->ticket_id,
                'qty'=>$item->qtd,
                'price'=>$item->ticket->price,
                'total'=>$item->ticket->price*$item->qtd,
                'status'=>1
            ]);

            Transaction::create([
                'sell_id'=>$sell->id,
                'user_id'=>0,
                'protocol_id'=>$data['protocol_id'],
                'reference'=>$ref,
                'method'=>$data['method']
            ]);

            for ($i=0; $i < $item->qtd; $i++) { 
                SellDetails::create([
                    'sell_id'=>$sell->id,
                    'user_id'=>0,
                    'protocol_id'=>$data['protocol_id'],
                    'event_id'=>$item->event_id,
                    'ticket_id'=>$item->ticket_id,
                    'status'=>1,
                ]);
            }
        }

        foreach($cart as $item){
            $qtd = $item->qtd;
            $actual_ticket = Ticket::find($item->ticket_id);
            $new_qtd = $actual_ticket->max_qtd - $qtd;

            $actual_ticket->update([
                'max_qtd'=>$new_qtd
            ]);
            
            $item->delete();
        }

        return response([
            'message' => 'Sua ordem foi efectuada com sucesso. Va até a  Minhas Vendas para visualizar.',
        ],200);


    }

    public function selldetails($id){
        return response([
            'selldetail' => SellDetails::where('sell_id',$id)->with('ticket:id,name')->with('sell.transaction')->with('user')->with('sell')->get(),
        ],200);
    }
}
