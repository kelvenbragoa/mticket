<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BarStore;
use App\Models\Event;
use App\Models\Products;
use Illuminate\Http\Request;

class BarStoreController extends Controller
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
        
        $barstores = BarStore::where('event_id',$evento)->orderBy('id','desc')->get();
        return view('user.barstore.index',compact('barstores','event'));
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
        return view('user.barstore.create',compact('event'));
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

        BarStore::create($data);

        return back()->with('message','Bar criado com sucesso');
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
    public function edit($evento, $barstore)
    {
        //
        $event = Event::find($evento);
        $barstore = BarStore::find($barstore);
        return view('user.barstore.edit',compact('event', 'barstore'));
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
        $barstore = BarStore::find($id);

        $barstore->update($data);
        return back()->with('message','Bar Editado com sucesso');
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

    public function copy($evento, $barstore)
    {
        //
        $event = Event::find($evento);

        $barstore = BarStore::find($barstore);
        $newbar = BarStore::create([
            'name' => $barstore->name.'-COPY',
            'event_id' => $barstore->event_id,
        ]);

        foreach($barstore->products as $product){
            Products::create([
                'name' => $product->name,
                'qtd' => $product->qtd,
                'sell_price' => $product->sell_price,
                'buy_price' => $product->buy_price,
                'event_id' => $product->event_id,
                'bar_store_id' => $newbar->id
            ]);
        }
        $barstores = BarStore::where('event_id',$evento)->orderBy('id','desc')->get();


        return view('user.barstore.index',compact('barstores','event'));

    }
}
