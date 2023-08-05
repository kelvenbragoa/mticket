<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Products;
use App\Models\SellBar;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($evento)
    {
        //

        $event = Event::find($evento);
        
        $produtos = Products::where('event_id',$evento)->orderBy('id','desc')->get();
        return view('user.produtos.index',compact('produtos','event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($evento)
    {
        //
        $event = Event::find($evento);
        return view('user.produtos.create',compact('event'));
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

        Products::create($data);

        return back()->with('message','Produto criado com sucesso');
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
    public function edit($evento, $produtos)
    {
        //
        $event = Event::find($evento);
        $produto = Products::find($produtos);
        return view('user.produtos.edit',compact('event', 'produto'));
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

        $data = $request->all();
        $produto = Products::find($id);

        $produto->update($data);
        return back()->with('message','Produto Editado com sucesso');
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
        $produto = Products::findOrFail($id);

        $sell = SellBar::where('ticket_id',$produto->id)->get();

        if(count($sell) == 0){
            $produto->delete();
            return back()->with('message','Produto apagado com sucesso');

        }else{
            return back()->with('messageError','Impossível apagar este produtos. Existe vendas relacionadas a este produtos.');
        }
    }
}
