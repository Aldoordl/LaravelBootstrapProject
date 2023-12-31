<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Guard;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('bootstrap.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => true, // Tambahkan status online saat pendaftaran
        ]);
    }

    public function register(Request $request, ActivityLogController $activityLogController)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // Perubahan: Ganti 'guard' dengan 'loginUsingId' untuk mengautentikasi user yang baru terdaftar
        // Auth::loginUsingId($user->id);

        // Autentikasi user yang baru terdaftar
        Auth::login($user);

        // Catat log aktivitas pendaftaran pengguna
        $activityLogController->logUserRegistered($user);

        return redirect()->route('resume.download.page')->with('success', 'Successfully login!! Welcome to ' . config('app.name')); // Ganti 'home' dengan nama rute yang sesuai
    }
}
