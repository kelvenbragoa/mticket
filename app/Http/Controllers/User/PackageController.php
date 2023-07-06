<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Packages;
use App\Models\Sell;
use App\Models\Ticket;
use Illuminate\Http\Request;

class PackageController extends Controller
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
        
        $packages = Ticket::where('event_id',$evento)->where('is_package',1)->orderBy('id','desc')->get();
        return view('user.pacote.index',compact('packages','event'));
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
        return view('user.pacote.create',compact('event'));
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

        Ticket::create([
            'name'=>$data['name'],
            'price'=>$data['price'],
            'description'=>$data['description'],
            'event_id'=>$data['event_id'],
            'start_date'=>'2022-01-01',
            'end_date'=>'2022-01-01',
            'start_time'=>'06:00:00',
            'end_time'=>'06:00:00',
            'max_qtd'=>0,
            'is_package'=>1,

        ]);

        return back()->with('message','Pacote criado com sucesso');
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
    public function edit($evento, $pacote)
    {
        //
        $event = Event::find($evento);
        $package = Ticket::find($pacote);
        return view('user.pacote.edit',compact('event', 'package'));
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
        $package = Ticket::find($id);

        $package->update($data);
        return back()->with('message','Pacote Editado com sucesso');
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
        $package = Ticket::findOrFail($id);

        $sell = Sell::where('ticket_id',$package->id)->get();

        if(count($sell) == 0){
            $package->delete();
            return back()->with('message','Pacote apagado com sucesso');

        }else{
            return back()->with('messageError','Impossível apagar este pacote. Existe vendas relacionadas a este pacote.');
        }
    }
}
