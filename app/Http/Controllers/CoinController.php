<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoinController extends Controller
{
    //add coin to user
    public function addCoin(Request $request)
    {
        //validate request
        $request->validate([
            "amount" => "required|numeric",
            "info" => "required|string",
        ]);


        //add coin transaction
        $coinTransaction = $request->user()->coinTransactions()->create([
            "amount" => $request->get("amount"),
            "info" => $request->get("info"),
        ]);

        $user = auth()->user();
        $user->coin = $user->coin + $request->get("amount");
        $user->save();

        $currentCoin = $user->coin;
        return response()->json(["massage" => "Coin added successfully","currentCoin" => $currentCoin], 200);
    }

    //get user coin
    public function getCoin()
    {
        $user = auth()->user();
        return response()->json(["coin" => $user->coin,"user" =>$user], 200);
    }
}
