<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Settings;
use App\Models\User;;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function authPage()
    {
        if(\auth()->check()) {
            return redirect()->route('family.index');
        }

        return view('pages.auth');
    }

    public function register(RegisterRequest $request)
    {
        $isUserExists = User::where('email', $request->email)->exists();

        if ($isUserExists) {
            return response()->json([
                'success' => false,
                'data' => 'User with email already exists'
            ], 400);
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'email_verified_at' => now()
        ]);

        $user->save();

        \auth()->login($user);

        return redirect(route('family.index'))->with('user', $user);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('family.index'))->with('user', $user);
        }

        return response()->json([
            'success' => false,
            'data' => 'The provided credentials do not match our records.'
        ], 400);
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('auth.'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_password' => 'required|string'
        ]);

        $user = \auth()->user();

        if (!\Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'success' => false,
                'data' => 'The provided old password is incorrect.'
            ], 400);
        }

        if ($request['new_password'] !== $request['confirm_password']) {
            return response()->json([
                'success' => false,
                'data' => 'Password not the same.'
            ], 400);
        }


        $user->password = \Hash::make($request->new_password);
        $user->save();

        return redirect(route('family.index'));

    }
}
