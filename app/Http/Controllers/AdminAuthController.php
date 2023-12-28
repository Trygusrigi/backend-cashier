<?php

namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = Auth::user()->createToken('TokenName')->accessToken;

            return response()->json(['token' => $token, 'user' => $user], Response::HTTP_OK);
        } else {
            return response()->json(['message' => "Email or Password doesn't match record"], Response::HTTP_UNAUTHORIZED);
        }
    }
}
