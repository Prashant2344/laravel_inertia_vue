<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return response()->json([
                'message' => 'Login Success',
                'status' => 200
            ]);
            // Redirect to intended URL or default route after login
            // return redirect()->intended('/');
        }

        // If login fails, throw validation error
        throw ValidationException::withMessages([
            'email' => [__('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page after logout
        return redirect('/login');
    }
}
