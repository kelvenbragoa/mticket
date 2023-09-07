<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Barman;
use Illuminate\Http\Request;

class BarmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // $request->validate([
        //     'mobile' => ['required','numeric'],
        //     'name' => ['required'],
        //     'bi' => ['required'],
            
           
        // ]);

        $test = Barman::orderBy('id','desc')->first();
        $string = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(3/strlen($x)) )),1,6);

        if($test == null){
            $user = $string.'1';
            Barman::create([
                'name'=>$data['name'],
                'mobile'=>$data['mobile'],
                'user'=>$user,
                'bi'=>$data['bi'],
                'password'=>$data['bi'],
                'event_id'=>$data['event_id'],
                'bar_store_id'=>$data['bar_store_id'],

            ]);
        }else{
            $user = $string.$test->id+1;
            Barman::create([
                'name'=>$data['name'],
                'mobile'=>$data['mobile'],
                'user'=>$user,
                'bi'=>$data['bi'],
                'password'=>$data['bi'],
                'event_id'=>$data['event_id'],
                'bar_store_id'=>$data['bar_store_id'],

            ]);
        }


        return back()->with('message','Barman adicionado com sucesso');
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
