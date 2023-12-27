<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Hash;
 use App\Models\User;



class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|unique:users',
            'email' => 'string|email|unique:users',
            'password' => 'string'
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
        ], 200);
    }
}
