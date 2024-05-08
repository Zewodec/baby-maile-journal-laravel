<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function authPage()
    {
        return view('pages.auth');
    }

    public function register(RegisterRequest $request)
    {
        return response()->json([
            'message' => 'Registration successful',
            'data' => $request->validated()
        ]);
    }

    public function login(LoginRequest $request)
    {
        return response()->json([
            'message' => 'Login successful',
            'data' => $request->validated()
        ]);
    }
}
