<?php

namespace App\Http\Controllers\Api\Barman;

use App\Http\Controllers\Controller;
use App\Models\Barman;
use App\Models\Event;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //


    public function login(Request $request){
        $data = $request->all();


        $barman = Barman::where('user',$data['user'])->where('password',$data['password'])->first();
        if($barman == null){
            return response(
                [ 'message' => 'Usuario/Password Incorretos'], 403
             );
        }
        $event = Event::find($barman->event_id);

        $initial_date = date('l, d M Y',strtotime($event->start_date)) ;



        $array = array(
            'id' => $barman->id,
            'name' => $barman->name,
            'mobile' => $barman->mobile,
            'bi' => $barman->bi,
            'password' => $barman->password,
            'user' => $barman->user,
            'event_id' => $barman->event_id,
            'event_name'=> $barman->event->name,
            'date'=> $initial_date ,
           
        );
       
        
        return response([
            'user' => $array,
        ],200);
   
    }
}
