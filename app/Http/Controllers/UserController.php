<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function loginStatus(Request $request)
    {
        return  ['status' => $request->session()->all()];
    }

    public function login(Request $request)
    {
        $user = User::where('email', request('email'))->get();
        $success = false;
        $message = '';

        if(!isset($user[0]->name)){
            $message = '使用者不存在';
        }elseif(password_verify(request('password'), $user[0]->password)){
            $request->session()->put('user', $user[0]->name);
            $success = true;
            $message = '登入成功';
        }else{
            $message = '密碼錯誤';
        }

        return ['success'=> $success, 'message' => $message];
    }

    public function signUp(Request $request)
    {
        $user = User::where('email', request('email'))->get();
        $success = false;
        $message = '';

        if(!isset($user[0]->name)){
            User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => password_hash(request('password'), PASSWORD_DEFAULT)
            ]);
            $success = true;
        }else{
            $message = '信箱已註冊';
        }

        return ['success'=> $success, 'message' => $message, $user];
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return 'flush';
    }
}
