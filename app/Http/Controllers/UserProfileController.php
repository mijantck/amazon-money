<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    public function registration(Request $request)
    {
        //registration with rest api
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
        ]);

        //check if user is already registered
        $user = User::query()->where("email", $request->get("email"))->first();

        if ($user) {
            return response()->json(["message" => "User already registered"], 400);
        }

        $user = new User();
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->password = Hash::make($request->get("password"));
        //generate unique 6 digit referral code in uppercase
        $user->referral_code = User::generateReferralCode();

        $user->save();

        //create token
        $token = $user->createToken("token")->plainTextToken;

        return response()->json(["message" => "User registered successfully","user" => $user,"token"=>$token], 200);
    }

    public function login(Request $request)
    {
        //login with rest api
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        //check if email and password is correct
        $user = User::query()->where("email", $request->get("email"))->first();

        if (!$user || !Hash::check($request->get("password"), $user->password)) {
            return response()->json(["message" => "Invalid credentials"], 400);
        }

        //create token
        $token = $user->createToken("token")->plainTextToken;

        return response()->json(["user" => $user, "token" => $token], 200);
    }

    public function logout(Request $request)
    {
        //logout with rest api
        auth()->user()->tokens()->delete();

        return response()->json(["message" => "Logged out successfully"], 200);
    }

    public function profile(Request $request)
    {
        //get user profile with rest api
        return response()->json(auth()->user(), 200);
    }

}
