<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get("/create-link", [\App\Http\Controllers\VisitWebSiteLinkController::class,"create"]);
Route::post("/create-link", [\App\Http\Controllers\VisitWebSiteLinkController::class,"store"]);
Route::get("/getLinks",[\App\Http\Controllers\VisitWebSiteLinkController::class,"getLinks"]);
Route::get("/get-link/{visitWebSiteLink}",[\App\Http\Controllers\VisitWebSiteLinkController::class,"getLink"]);
Route::put("/update-link/{visitWebSiteLink}",[\App\Http\Controllers\VisitWebSiteLinkController::class,"updateLink"]);

