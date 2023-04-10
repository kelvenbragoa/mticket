<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Sell;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
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
        
        $tickets = Ticket::where('event_id',$evento)->orderBy('id','desc')->get();
        return view('user.bilhete.index',compact('tickets','event'));
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
        return view('user.bilhete.create',compact('event'));
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

        Ticket::create($data);

        return back()->with('message','Bilhete criado com sucesso');
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
    public function edit($evento, $bilhete)
    {
        //
        $event = Event::find($evento);
        $ticket = Ticket::find($bilhete);
        return view('user.bilhete.edit',compact('event', 'ticket'));
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
        $ticket = Ticket::find($id);

        $ticket->update($data);
        return back()->with('message','Bilhete Editado com sucesso');
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
        $ticket = Ticket::find($id);

        $sell = Sell::where('ticket_id',$ticket->id)->get();

        if(count($sell) == 0){
            $ticket->delete();
            return back()->with('message','Bilhete apagado com sucesso');

        }else{
            return back()->with('messageError','Impossível apagar este bilhete. Existe vendas relacionadas a este bilhete.');
        }
    }
}
