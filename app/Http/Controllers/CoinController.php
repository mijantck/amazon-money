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

    public function addDailyReward(Request $request)
    {
        $user = auth()->user();

        //check if user already got today reward
        $todayReward = $user->coinTransactions()
            ->whereDate("created_at", now())
            ->where("info", "daily_reward")
            ->first();


        if($todayReward){
            return response()->json(["message" => "You already got today reward"], 400);
        }

        $user->coinTransactions()->create([
            "amount" => 100,
            "info" => "daily_reward",
        ]);

        $user->coin = $user->coin + 100;
        $user->save();

        return response()->json(["massage" => "Daily Reward added successfully"], 200);
    }
}
