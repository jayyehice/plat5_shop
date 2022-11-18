<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function loginStatus(Request $request)
    {
        return  ['status' => Auth::check()];
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', request('email'))->get();

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            Auth::login($user->first());
            return ['success'=> true, 'message' => '登入成功'];
        }

        return ['success'=> false, 'message' => '帳號密碼錯誤'];
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
