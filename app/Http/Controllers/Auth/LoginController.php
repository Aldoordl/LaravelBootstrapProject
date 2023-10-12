<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
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
            $user = Auth::user();

            // Catat log aktivitas login
            ActivityLog::create([
                'user_id' => $user->id,
                'activity' => 'user_login',
                'description' => 'User ' . $user->name . ' logged in.',
            ]);

            if ($user->role === 'admin') {
                // Pengguna memiliki peran admin, arahkan ke dashboard admin
                return redirect()->route('admin.dashboard')->with('success', 'Successfully login!! Welcome Admin ' . config('app.name'));
            } else {
                // Pengguna biasa, arahkan ke halaman download
                return redirect()->route('resume.download.page')->with('success', 'Successfully login!! Welcome to ' . config('app.name'));
            }
        } else {
            // Autentikasi gagal, tampilkan pesan error
            throw ValidationException::withMessages([
                'email' => 'The email field is required.',
                'password' => 'The password field is required.',
            ]);
        }
    }
}
