<?php

namespace App\Http\Controllers\Api\Dashboard\Auth;


use App\Http\Requests\Api\Dashboard\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\User\User;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();


        return response()->json([
            'user' => [
                'name' => $user->fullName,
                'email' => $user->email
            ]
        ]);
    }
}
