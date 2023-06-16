<?php

namespace App\Http\Controllers\Api\Protocols;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Protocol;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function login(Request $request){
        $data = $request->all();


        $protocol = Protocol::where('user',$data['user'])->where('password',$data['password'])->first();
        if($protocol == null){
            return response(
                [ 'message' => 'Usuario/Password Incorretos'], 403
             );
        }
        $event = Event::find($protocol->event_id);

        $initial_date = date('l, d M Y',strtotime($event->start_date)) ;



        $array = array(
            'id' => $protocol->id,
            'name' => $protocol->name,
            'mobile' => $protocol->mobile,
            'bi' => $protocol->bi,
            'password' => $protocol->password,
            'user' => $protocol->user,
            'event_id' => $protocol->event_id,
            'event_name'=> $protocol->event->name,
            'date'=> $initial_date ,
           
        );
       
        
        return response([
            'user' => $array,
        ],200);
   
    }
}
