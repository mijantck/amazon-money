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

//add route for user profile
Route::post("register", [\App\Http\Controllers\UserProfileController::class, "registration"]);
Route::post("login", [\App\Http\Controllers\UserProfileController::class, "login"]);
Route::post("google-login", [\App\Http\Controllers\UserProfileController::class, "loginWithGoogle"]);

Route::post("forget-password", [\App\Http\Controllers\UserProfileController::class, "forgetPassword"]);
Route::post("reset-password", [\App\Http\Controllers\UserProfileController::class, "resetPassword"]);

Route::post("logout", [\App\Http\Controllers\UserProfileController::class, "logout"])->middleware("auth:sanctum");
Route::get("get-profile", [\App\Http\Controllers\UserProfileController::class, "profile"])->middleware("auth:sanctum");

Route::post("set-referred-by", [\App\Http\Controllers\UserProfileController::class, "setReferredBy"])->middleware("auth:sanctum");


//coin routes
Route::get("get-coin", [\App\Http\Controllers\CoinController::class, "getCoin"])->middleware("auth:sanctum");
Route::post("add-coin", [\App\Http\Controllers\CoinController::class, "addCoin"])->middleware("auth:sanctum");

//Route::get("/create-link", [\App\Http\Controllers\VisitWebSiteLinkController::class,"create"]);
Route::post("/create-link", [\App\Http\Controllers\VisitWebSiteLinkController::class,"store"]);
Route::get("/getLinks",[\App\Http\Controllers\VisitWebSiteLinkController::class,"getLinks"]);
Route::get("/get-link/{visitWebSiteLink}",[\App\Http\Controllers\VisitWebSiteLinkController::class,"getLink"]);
Route::put("/update-link/{visitWebSiteLink}",[\App\Http\Controllers\VisitWebSiteLinkController::class,"updateLink"]);

//Gift Card routes
Route::post("/create-gift-card",[\App\Http\Controllers\GiftCardController::class,"storeGift"])->middleware("auth:sanctum");

//Payment req
Route::post("/create-payment_req",[\App\Http\Controllers\PaymentRequstController::class,"createPaymentsRequest"])->middleware("auth:sanctum");

