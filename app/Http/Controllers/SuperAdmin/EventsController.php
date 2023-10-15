<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Barman;
use App\Models\BarStore;
use App\Models\Event;
use App\Models\Sell;
use App\Models\SellBar;
use App\Models\SellDetailBar;
use App\Models\SellDetails;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::orderBy('id','desc')->paginate(50);
        return view('superadmin.events.index',compact('events'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $data = $request->all();

        $imagePath = request('image')->store('event','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();

        Event::create([
            'user_id'=> Auth::user()->id,
            'name' => $data['name'],
            'image' => $imagePath,
            'province_id' => $data['province_id'],
            'city_id' => $data['city_id'],
            'description' => $data['description'],
            'main_category_id' => $data['main_category_id'],
            'second_category_id' => $data['second_category_id'],
            'address' => $data['address'],
            'start_date' => $data['start_date'],
            'start_time' => $data['start_time'],
            'end_date' => $data['end_date'],
            'end_time' => $data['end_time'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'instagram' => $data['instagram'],
            'youtube' => $data['youtube'],
            'status_id' => 3,
        ]);

        return redirect()->route('painel.index')->with('message','O seu evento foi adicionado com sucesso. Termine a configurações do seu evento no menu "Meus Eventos"');*/


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
        $event = Event::find($id);
        $sells_amount = SellDetailBar::where('event_id',$event->id)->get();
        $barstores = BarStore::where('event_id',$id)->get();
        $investment = 0;

        foreach($event->products as $item){
            $investment = $investment + $item->qtd*$item->buy_price;
        }
        return view('superadmin.events.show',compact('event','investment','sells_amount','barstores'));
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
        $event = Event::find($id);
        return view('superadmin.events.edit',compact('event'));
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
        /* 
        $event = Event::find($id);
        $data = $request->all();

        if(request('image')){
            $imagePath = request('image')->store('event','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray = ['image'=> $imagePath ];

            try {
                //code... 
                unlink("storage/".$event->image);
            } catch (\Throwable $th) {
                //throw $th;
            }

           
        }

        $event->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        
        return redirect()->route('eventos.index')->with('message','Evento editado com sucesso');*/
        $event = Event::find($id);
        $data = $request->all();
        $event->update(
            $data,
          
        );
        return back()->with('message','Evento editado com sucesso');

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


    public function bar_report($event_id){

        $event = Event::find($event_id);
        $investment = 0;

        foreach($event->products as $item){
            $investment = $investment + ($item->qtd*$item->buy_price) + ($item->sells->sum('qtd') * $item->buy_price);
        }

        
      

      
       
        $pdf = Pdf::loadView('superadmin.events.report', compact('event','investment'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->setPaper('a4')->download('invoice.pdf');


    }


    public function ticket_report($event_id){

        $event = Event::find($event_id);
        $tickets_local = Sell::where('event_id',$event->id)->where('user_id',0)->get();
        $tickets_online = Sell::where('event_id',$event->id)->where('user_id','!=',0)->where('user_id','!=',55)->get();
        $invites_online = Sell::where('event_id',$event->id)->where('user_id',55)->get();

        $tickets_local_true = SellDetails::where('event_id',$event->id)->where('user_id',0)->where('status',1)->get();
        $tickets_local_false = SellDetails::where('event_id',$event->id)->where('user_id',0)->where('status',0)->get();
        $tickets_online_true = SellDetails::where('event_id',$event->id)->where('user_id','!=',0)->where('user_id','!=',55)->where('status',1)->get();
        $tickets_online_false = SellDetails::where('event_id',$event->id)->where('user_id','!=',0)->where('user_id','!=',55)->where('status',0)->get();
        $invites_online_true = SellDetails::where('event_id',$event->id)->where('user_id',55)->where('status',1)->get();
        $invites_online_false = SellDetails::where('event_id',$event->id)->where('user_id',55)->where('status',0)->get();


        $pending_tickets = SellDetails::where('event_id',$event->id)->where('status',1)->count();



        $tickets_local_amount = 0;

        
        foreach($tickets_local as $item){
            $tickets_local_amount =$tickets_local_amount + $item->qty*$item->price;
        }

      

      
       
        $pdf = Pdf::loadView(
            'superadmin.events.report-ticket', 
            compact(
                'event',
                'tickets_local',
                'tickets_online',
                'invites_online',
                'tickets_local_amount',
                'tickets_local_true',
                'tickets_local_false',
                'tickets_online_true',
                'tickets_online_false',
                'invites_online_true',
                'invites_online_false',
                'pending_tickets',
                ))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->setPaper('a4')->stream('invoice.pdf');


    }

    public function bar_store_report($id){

        $barstore = BarStore::find($id);
        $event = Event::find($barstore->event_id);
        $barmans = Barman::where('bar_store_id',$id)->get();
        $pdf = Pdf::loadView(
            'superadmin.events.bar-store-report', 
            compact(
                'event',
                'barstore',
                'barmans'
                ))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->setPaper('a4')->stream('barstore.pdf');
    }


    public function barmanreport($id){
        $barman = Barman::find($id);
        $sells  = SellBar::where('verified_by',$id)->get();
        $sells_made  = SellBar::where('user_id',$id)->get();
        return view('superadmin.events.barma-report',compact('barman','sells','sells_made'));
    }

}
