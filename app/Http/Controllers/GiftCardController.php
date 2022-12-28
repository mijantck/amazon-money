<?php

namespace App\Http\Controllers;

use App\Models\GiftCard;
use Illuminate\Http\Request;

class GiftCardController extends Controller
{
    //
    public function storeGift(Request $request){

        $user = auth()->user();
        if ($user->coin < $request->get("amount")){
            $currentCoin = $user->coin;
            return response()->json(["massage" => "You have not enough coin","currentCoin" => $currentCoin]);
        }

        $coinTransaction = $request->user()->coinTransactions()->create([
            "amount" => $request->get("amount"),
            "info" => $request->get("name"),
        ]);

        $user->coin = $user->coin - $request->get("amount");
        $user->save();
        $currentCoin = $user->coin;

        $giftCard = new GiftCard();
        $giftCard->name =$request->get("name");
        $giftCard->email =$request->get("email");
        $giftCard->user_id =$user->id;
        $giftCard->amount =$request->get("amount");
        $giftCard->save();

       return response()->json(["massage" => "Create Done","currentCoin"=>$currentCoin],200);
    }

}
