<?php

namespace App\Http\Controllers\Api\Dashboard\Account;


use App\Http\Requests\Api\Dashboard\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AccountController extends Controller {

    public function register(Request $request) {

        User::CreateOrUpdate([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->get('password')),
        ]);

        return response()->json([
            'message' => 'Usuário criado com sucesso!'
        ], 200);

    }




}


