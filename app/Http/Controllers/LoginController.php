<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;

class LoginController extends Controller
{
    public function login(Request $request ) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw UnauthorizedException::withMessages([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }
        $token = $user->createToken('apitoken')->plainTextToken;

        return ['token' => $token];
    }
}
