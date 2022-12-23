<?php

namespace App\Http\Controllers;

use App\Models\VisitWebSiteLink;
use Illuminate\Http\Request;

class VisitWebSiteLinkController extends Controller
{
    //
    public function store(Request $request){
        $link = new VisitWebSiteLink();
        $link->name =$request->get("name");
        $link->url = $request->get("url");
        $link->image =$request->get("image");
        $link->coin = $request->get("coin");
        $link->details = $request->get("details");
        $link->save();
        return response()->json(["massage" => "Create Done","data" => $link]);
    }


    public function getLinks(){
        $links = VisitWebSiteLink::query()->get();
        return response()->json($links);

    }

    public function getLink(VisitWebSiteLink $visitWebSiteLink){
     return response()-> json($visitWebSiteLink);
    }
    public function updateLink(VisitWebSiteLink $visitWebSiteLink,Request $request){
        $visitWebSiteLink->name =$request->get("name");
        $visitWebSiteLink->url = $request->get("url");
        $visitWebSiteLink->image =$request->get("image");
        $visitWebSiteLink->coin = $request->get("coin");
        $visitWebSiteLink->details = $request->get("details");
        $visitWebSiteLink->save();
        return response()->json(["massage" => "Update Done","data" => $visitWebSiteLink]);
    }
}

