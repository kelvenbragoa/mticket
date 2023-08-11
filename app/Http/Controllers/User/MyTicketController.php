<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Event;
use App\Models\Sell;
use App\Models\SellDetails;
use App\Models\Ticket;
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
        $msisdn = $data['mobile'];

        $c2b = $transactionmpesa->c2b(
            $amount, //valor a cobrar do cliente
            $msisdn, // número de telefone do cliente vodacom com mpesa registrado
            $ref, //referencia do pagamento
            $ref //referencia do pagamento
        );

        if($c2b->getCode() === 'INS-0') { //codigo de sucesso de pagamento

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
            $qtd = $item->qtd;
            $actual_ticket = Ticket::find($item->ticket_id);
            $new_qtd = $actual_ticket->max_qtd - $qtd;

            $actual_ticket->update([
                'max_qtd'=>$new_qtd
            ]);
            
            $item->delete();
        }



        return redirect()->route('meusbilhetes.index');
    }

    if($c2b->getCode() === 'INS-1') {

        return back()->with('messageError', 'Erro interno, volte a tentar novamente');

    }

    if($c2b->getCode() === 'INS-2') {
        //API INVALIDA
        return back()->with('messageError', 'Erro interno, volte a tentar novamente');

    }

    if($c2b->getCode() === 'INS-4') {
        //API INVALIDA, USUARIO NAO ATIVO
        return back()->with('messageError', 'Erro interno, volte a tentar novamente');

    }

    if($c2b->getCode() === 'INS-5') {
        //API INVALIDA, USUARIO CANCELOU
        return back()->with('messageError', 'Transação cancelado pelo usuário');

    }

    if($c2b->getCode() === 'INS-6') {
        //API INVALIDA, Transaçãp falhou
        return back()->with('messageError', 'Transação falhou');

    }

    if($c2b->getCode() === 'INS-9') {
        //API INVALIDA, REQUEST TIMEOUT
        return back()->with('messageError', 'O tempo expirou. Volte a tentar');

    }

    if($c2b->getCode() === 'INS-10') {
    
        return back()->with('messageError', 'Transação duplicada');

    }
    if($c2b->getCode() === 'INS-16') {
    
        return back()->with('messageError', 'Erro interno volte mais tarde');

    }

    if($c2b->getCode() === 'INS-2006') {
    
        return back()->with('messageError', 'Saldo insuficiente');

    }

    if($c2b->getCode() === 'INS-2051') {
    
        return back()->with('messageError', 'Número de telefone inválido');

    }


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

       
        return view('frontend.viewticket',compact('detail','event','sell'));
        // return view('frontend.ticket',compact('detail','event'));
    }

    public function download($id)
    {
        //
        $sell = Sell::find($id);

        // $detail = $sell->selldetails;

        $detail = SellDetails::where('sell_id',$id)->get();

        $event = Event::find($sell->event_id);

       
        

        $pdf = Pdf::loadView('frontend.ticket', compact('detail','event'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->setPaper('a4')->stream('ticket.pdf');
        // return view('frontend.ticket',compact('detail','event'));
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
