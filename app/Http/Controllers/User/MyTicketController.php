<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Event;
use App\Models\Sell;
use App\Models\SellDetails;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class MyTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $myticket = Sell::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        
        $transaction = Transaction::orderBy('id','desc')->first();

       
        
      
        return view('frontend.meusbilhetes',compact('myticket'));
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

        $config = \abdulmueid\mpesa\Config::loadFromFile('config.php');
        $transactionmpesa = new \abdulmueid\mpesa\Transaction($config);
        $data = $request->all();

        $request->validate([
            'mobile' => ['required','numeric'],
           
        ]);

        $string = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(3/strlen($x)) )),1,4);

        $transaction = Transaction::orderBy('id','desc')->first();

        $add = $transaction->id + 1;

        $ref = 'MT'.Auth::user()->id.'T'.$string.$add;
        $amount= $data['amount'];
        $cart = Carts::where('user_id',Auth::user()->id)->get();

        foreach($cart as $item){
            $sell = Sell::create([
                'user_id'=>Auth::user()->id,
                'event_id'=>$item->event_id,
                'ticket_id'=>$item->ticket_id,
                'qty'=>$item->qtd,
                'price'=>$item->ticket->price,
                'total'=>$item->ticket->price*$item->qtd,
                'status'=>1
            ]);

            Transaction::create([
                'sell_id'=>$sell->id,
                'user_id'=>Auth::user()->id,
                'reference'=>$ref,
                'method'=>'mpesa'
            ]);

            for ($i=0; $i < $item->qtd; $i++) { 
                SellDetails::create([
                    'sell_id'=>$sell->id,
                    'user_id'=>Auth::user()->id,
                    'event_id'=>$item->event_id,
                    'ticket_id'=>$item->ticket_id,
                    'status'=>1,
                ]);
            }
        }

        foreach($cart as $item){
            $item->delete();
        }



        return redirect()->route('meusbilhetes.index');
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
        $sell = Sell::find($id);

        // $detail = $sell->selldetails;

        $detail = SellDetails::where('sell_id',$id)->get();

        $event = Event::find($sell->event_id);


     
        return view('frontend.ticket',compact('detail','event'));
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
