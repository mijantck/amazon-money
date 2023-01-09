<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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

        return response()->json(["message" => "User registered successfully", "user" => $user, "token" => $token], 200);
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

    //login with google
    public function loginWithGoogle(Request $request)
    {
        $request->validate([
            'access_token' => 'required'
        ]);

        $token = $request->access_token;

        try {
            $access_token = Socialite::driver('google')->getAccessTokenResponse($token);
            $oauthUser = Socialite::driver('google')->stateless()->userFromToken($access_token['access_token']);

            $user = User::query()->where('provider_id', $oauthUser->id)->where('provider', "google")->first();;

            if (!$user) {
                $user = $this->createUser('google', $oauthUser);
            }

            $user->refresh();

            $user = new User();
            $user->email = $oauthUser->email;
            $user->name = $oauthUser->name;
            $user->provider_id = $oauthUser->id;
            $user->provider = "google";
            $user->referral_code = User::generateReferralCode();

            $user->save();

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('auth')->plainTextToken
            ]);

        } catch (\Exception $exception) {
            Log::error($exception);
            abort('500', 'Authentication Error');
        }
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

    public function forgetPassword(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users,email",
        ]);

        $user = User::query()->where("email", $request->get("email"))->first();

        //send email with otp
        $otp = Str::random(6);
        $user->otp = $otp;
        $user->save();

        //send email with otp
        Mail::to($user->email)->send(new ForgetPasswordMail($user));

        return response()->json(["message" => "OTP sent to your email"], 200);

    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users,email",
            "otp" => "required",
            "password" => "required|min:6",
        ]);

        $user = User::query()->where("email", $request->get("email"))->first();

        if ($user->otp != $request->get("otp")) {
            return response()->json(["message" => "Invalid OTP"], 400);
        }

        $user->password = Hash::make($request->get("password"));
        $user->save();

        return response()->json(["message" => "Password reset successfully"], 200);
    }

    public function setReferredBy(Request $request)
    {
        $request->validate([
            "referral_code" => "required|exists:users,referral_code",
        ]);

        if(auth()->user()->referral_code == $request->get("referral_code")){
            return response()->json(["message" => "You can't refer yourself"], 400);
        }

        if(auth()->user()->referred_by){
            return response()->json(["message" => "You have already referred by someone"], 400);
        }

        $referral_user = User::query()->where("referral_code", $request->get("referral_code"))->first();
        $user = auth()->user();

        $user->referred_by = $referral_user->id;
        $user->save();

        //add coins
        $referral_user->coinTransactions()->create([
            "amount" => 100,
            "info" => "Referral bonus for user " . $user->id,
        ]);

        $referral_user->coins += 100;

        $referral_user->save();

        return response()->json(["message" => "Referred by set successfully"], 200);
    }

}
