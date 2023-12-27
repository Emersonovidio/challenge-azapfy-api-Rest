<?php

namespace App\Http\Controllers;


use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();


        return response()->json([
            'user' => $user->name,
            'message' => 'Usuário logado com sucesso.'
        ], 200);
    }
}
