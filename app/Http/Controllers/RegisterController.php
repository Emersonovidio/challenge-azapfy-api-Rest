<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Foundation\Auth\User;



class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique',
            'password' => 'required|min:8'
        ]);
        
        $newUser =  User::create(([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));
        
        Auth::login($newUser);

        return response()->json([
            'user' => $newUser,
            'message' => 'Usuário criado com sucesso.'
        ], 201);
    }
}
