<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function viewLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = User::query()->where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::loginUsingId($admin->id, true);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid Credentials']);
        }

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
