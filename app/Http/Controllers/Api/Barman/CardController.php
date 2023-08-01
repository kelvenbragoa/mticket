<?php

namespace App\Http\Controllers\Api\Barman;

use App\Http\Controllers\Controller;
use App\Models\CardTransaction;
use App\Models\EventCard;
use Illuminate\Http\Request;

class CardController extends Controller
{
    //

    public function registerCard($id){

        $card = EventCard::create([
            'name'=>'USER',
            'event_id'=>$id,
            'status'=>0,
            'card_id'=>0,
            'balance'=>0,
        ]);

        


        return response([
            'card' => [$card],
        ],200);
    }

    public function viewCard($id){

        $card = EventCard::where('id',$id)->get();

        


        return response([
            'card' => $card,
        ],200);
    }

    public function topUpCard($id,$top){

        $card = EventCard::find($id);
        $newBalance = $card->balance + $top;

        CardTransaction::create([
            'card_id'=>$card->id,
            'event_card_id'=>$card->id,
            'sell_id'=>0,
            'total'=>$top,
            'balance'=>$newBalance,
            'type_of_transaction_id'=>0,
        ]);

        $card->update([
            'balance'=>$newBalance,
            'status'=>1,
        ]);

        $newcard = EventCard::find($id);

        


        return response([
            'card' => [$newcard],
        ],200);
    }

    
}
