<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('bootstrap.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil, redirect ke halaman yang sesuai
            return redirect()->route('resume.download.page');
        } else {
            // Autentikasi gagal, tampilkan pesan error
            throw ValidationException::withMessages([
                'email' => 'The email field is required.',
                'password' => 'The password field is required.',
            ]);
        }
    }
}
