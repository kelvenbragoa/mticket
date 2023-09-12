<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Province;
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
