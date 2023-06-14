<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\LineUp;
use Illuminate\Http\Request;

class LineupController extends Controller
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
        
        $lineup = LineUp::where('event_id',$evento)->orderBy('id','desc')->get();
        return view('user.lineup.index',compact('lineup','event'));
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
        return view('user.lineup.create',compact('event'));
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

        LineUp::create($data);

        return back()->with('message','lineups criado com sucesso');
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
    public function edit($evento, $lineup)
    {
        //
        $event = Event::find($evento);
        $lineups = LineUp::find($lineup);
        return view('user.lineup.edit',compact('event', 'lineups'));
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
        $lineup = LineUp::find($id);

        $lineup->update($data);
        return back()->with('message','Lineup Editado com sucesso');
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
        $lineup = LineUp::findOrFail($id);

       

     
            $lineup->delete();
            return back()->with('message','Lineup apagado com sucesso');

       
    }
}
