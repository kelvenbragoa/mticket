<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MpesaController extends Controller
{
    //


    public function mpesapayment(Request $request) {

        $data = $request->all();

        

        
        $config = \abdulmueid\mpesa\Config::loadFromFile('config.php');
        $transactionmpesa = new \abdulmueid\mpesa\Transaction($config);

        // $c2b = $transactionmpesa->c2b(
        //     $data['amount'], //valor a cobrar do cliente
        //     $data['msisdn'], // número de telefone do cliente vodacom com mpesa registrado
        //     $data['ref'], //referencia do pagamento
        //     $data['ref'] //referencia do pagamento
        // );
        
        $c2b = $transactionmpesa->c2b(
            1, //valor a cobrar do cliente
            842648618, // número de telefone do cliente vodacom com mpesa registrado
            'OWP1062', //referencia do pagamento
            'OWP1062' //referencia do pagamento
        );

        return [
            'message'=>$c2b->getCode()
        ];

    }
}
