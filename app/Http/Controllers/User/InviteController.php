<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CustomerInvite;
use App\Models\Event;
use App\Models\Invite;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    //
    public function index($evento)
    {
        //

        $event = Event::find($evento);
        
        $invite = Invite::where('event_id',$evento)->orderBy('id','desc')->get();
        return view('user.invite.index',compact('invite','event'));
    }

    public function create($evento)
    {
        //
        $event = Event::find($evento);
        return view('user.invite.create',compact('event'));
    }

    public function store(Request $request)
    {
        //

        $data = $request->all();

        Invite::create($data);

        return back()->with('message','Convite criado com sucesso');
    }

    public function edit($evento, $invite)
    {
        //
        $event = Event::find($evento);
        $invites = Invite::find($invite);
        return view('user.invite.edit',compact('event', 'invites'));
    }

    public function show($evento, $invite)
    {
        //
        $event = Event::find($evento);
        $invites = Invite::find($invite);
        $customerinvites = CustomerInvite::where('invite_id', $invite)->get();
        return view('user.invite.show',compact('event', 'invites','customerinvites'));
    }
    public function update(Request $request, $id)
    {
        //

        $data = $request->all();
        $invite = Invite::find($id);

        $invite->update($data);
        return back()->with('message','Convite Editado com sucesso');
    }

    public function destroy($id)
    {
        //
        $invite = Invite::findOrFail($id);

       

     
            $invite->delete();
            return back()->with('message','Convite apagado com sucesso');

       
    }
}
