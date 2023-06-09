<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart = Carts::where('user_id',Auth::user()->id)->get();
        $total = 0;

        foreach($cart as $item){
            $total = $total + $item->ticket->price;
        }
        return view('frontend.carrinho',compact('cart','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        
        $qty = 0;
        for ($i=0; $i < count($data['quantity']) ; $i++) { 
            $qty = $qty + $data['quantity'][$i];
        }

        if($qty == 0){
            return back()->with('message','Nenhum Bilhete selecionado');
        }else{

        for ($i=0; $i < count($data['quantity']) ; $i++) { 
        if (Carts::where('user_id',Auth::user()->id )->where('ticket_id',$data['ticket_id'][$i])->where('sell_id',null)->exists()) {
            $rec_data = Carts::where('user_id',Auth::user()->id )->where('ticket_id',$data['ticket_id'][$i])->where('sell_id',null)->first();
            $qtd = $rec_data->qtd + $data['quantity'][$i];
            // dd($qtd);
            //  update($qtd,$rec_data->id );
            DB::table('carts')
              ->where('id', $rec_data->id )
              ->update(['qtd' => $qtd]);
            //   return back()->with('message','Foi aumentado a quantidade do produto, Clique para verificar');
        }else{
            if($data['quantity'][$i] > 0){
            Carts::create([
                'user_id' => Auth::user()->id,
                'ticket_id' => $data['ticket_id'][$i],
                'event_id' => $data['event_id'],
                'qtd' => $data['quantity'][$i],
                
            ]);
        }
    
            // return back()->with('message','Bilhete adicionado ao carrinho, Clique para verificar');
        }
    }
}

return back()->with('messageSuccess','Bilhete adicionado ao carrinho');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
