<?php

namespace App\Http\Controllers\Api\Protocols;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    //

    public function index($userid){
        
        return response([
    
            'cart' => Carts::with('ticket:name,price,id')->where('protocol_id',$userid)->where('sell_id',null)->get()
    
        ],200);
    
       }

    public function store(Request $request){

        $data = $request->all();

        if (Carts::where('user_id',0)->where('protocol_id',$data['protocol_id'])->where('ticket_id',$data['ticket_id'])->where('sell_id',null)->exists()) {
            $rec_data = Carts::where('user_id',0)->where('protocol_id',$data['protocol_id'])->where('ticket_id',$data['ticket_id'])->where('sell_id',null)->first();
            $qtd = $rec_data->qtd + $data['qtd'];
            // dd($qtd);
            //  update($qtd,$rec_data->id );
            DB::table('carts')
              ->where('id', $rec_data->id )
              ->update(['qtd' => $qtd]);
            //   return back()->with('message','Foi aumentado a quantidade do produto, Clique para verificar');
            return response([
                'message' => 'Foi acrescentada a quantidade do seu produto',
                
            ], 200);
        }else{
            
            Carts::create([
                'user_id' => 0,
                'protocol_id' => $data['protocol_id'],
                'ticket_id' => $data['ticket_id'],
                'event_id' => $data['event_id'],
                'qtd' => $data['qtd'],
                
            ]);

            return response([
                'message' => 'Produto adicionado com sucesso',
                
            ], 200);
        
    
            // return back()->with('message','Bilhete adicionado ao carrinho, Clique para verificar');
        }
    }
}
