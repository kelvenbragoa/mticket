<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Province;
use App\Models\SellBar;
use App\Models\SellDetailBar;
use App\Models\SellDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $categories= Category::orderBy('name','asc')->get();

        $events= Event::where('status_id',2)->orderBy('created_at','desc')->get();

       
       
        return view('welcome',compact('categories','events'));

    }


    public function bepromotor(){

        return view('frontend.promotor');

    }

    public function eventsCategory($categoria){

        $events= Event::where('main_category_id',$categoria)->where('status_id',2)->orderBy('id','desc')->get();
        $categoria = Category::find($categoria);
        return view('frontend.eventos-categoria',compact('events','categoria'));

    }

    public function eventsProvince($provincia){

        $events= Event::where('province_id',$provincia)->where('status_id',2)->orderBy('id','desc')->get();
        $provincia = Province::find($provincia);
        $provinces = Province::limit(4)->get();
        return view('frontend.eventos-provincia',compact('events','provincia','provinces'));

    }

    public function aboutus(){

        return view('info.aboutus');

    }

    public function contact(){

        return view('info.contact');

    }

    public function faq(){

        return view('info.faq');

    }

    public function help(){

        return view('info.help');

    }

    public function howitworks(){

        return view('info.howitworks');

    }

    public function politicas(){

        return view('info.politicas');

    }

    public function recargas() {

        return view('recargas.recargas');

    }


    public function updatedata(){

        $sellsbars = SellBar::whereDate('created_at',Carbon::today())->where('bar_store_id',18)->get();

        $sell = SellBar::find(11381);

        

        foreach($sellsbars as $sellbar){
            $minutes = rand(9,120);
            $sellbar->update([
                'created_at'=>$sell->created_at->addMinutes($minutes)
            ]);
        }

        dd("terminado");

        

    }
    

    public function damasio (){

        

        $sellsbars = SellBar::where('bar_store_id',18)->where('total','>','8000')->where('total','<','20000')->get();

        foreach($sellsbars as $sellbar){
            $minutes = rand(20,40);

            $id = SellBar::create([
                'user_id' => $sellbar->user_id,
                'total' => $sellbar->total,
                'method' => $sellbar->method,
                'ref' => $sellbar->ref,
                'status' => 1,
                'event_id' => $sellbar->event_id,
                'bar_store_id' => 18,
                'created_at'=>$sellbar->created_at->addMinutes($minutes)
            ])->id;

            $sellDetailsBars = SellDetailBar::where('sell_id',$sellbar->id)->get();

            foreach($sellDetailsBars as $selldetail){

                SellDetailBar::create([
                    'sell_id' => $id,
                    'user_id' => $sellbar->user_id,
                    'event_id' => $sellbar->event_id,
                    'product_id' => $selldetail->product_id,
                    'status' => 1,
                    'qtd' => $selldetail->qtd,
                    'price' => $selldetail->price,
                    'total' => $selldetail->total,
                    'bar_store_id'=>18
                ]);

            }

            // $minute1 = $sellbar->created_at->addMinute();

            // $minute2 = $sellbar->created_at->addMinutes(5);

            // dd($minute1, $minute2);


        }

        dd("terminado");
        // dd($sellsbars->count());

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
