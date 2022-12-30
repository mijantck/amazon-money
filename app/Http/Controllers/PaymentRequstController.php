<?php

namespace App\Http\Controllers;

use App\Models\PymentRequst;
use Illuminate\Http\Request;

class PaymentRequstController extends Controller
{
    //
    public function createPaymentsRequest(Request $request){

        $user = auth()->user();
        if ($user->coin < $request->get("amount")){
            $currentCoin = $user->coin;
            return response()->json(["massage" => "You have not enough coin","currentCoin" => $currentCoin]);
        }

        $coinTransaction = $request->user()->coinTransactions()->create([
            "amount" => $request->get("amount"),
            "info" => $request->get("payment_methode_name"),
        ]);

        $user->coin = $user->coin - $request->get("amount");
        $user->save();
        $currentCoin = $user->coin;

        $pymentRequest = new PymentRequst();
        $pymentRequest->payment_methode_name =$request->get("payment_methode_name");
        $pymentRequest->user_id = $user->id;
        $pymentRequest->account_id =$request->get("account_id");
        $pymentRequest->amount =$request->get("amount");
        $pymentRequest->save();

        return response()->json(["massage" => "Create Done","currentCoin"=>$currentCoin],200);
    }
}
