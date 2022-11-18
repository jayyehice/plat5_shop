<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function signUp(RegisterRequest $request)
    {
        $user = User::where('email', request('email'))->get();

        if(!isset($user[0]->name)){
            User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => password_hash(request('password'), PASSWORD_DEFAULT)
            ]);
            return ['success'=> true, 'message' => '註冊成功'];
        }

        return ['success'=> false, 'message' => '信箱已註冊'];
    }
}