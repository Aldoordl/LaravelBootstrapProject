<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMessage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah sesi berisi data pesan
        if (session('nama') || session('email') || session('pesan')) {
            return $next($request); // Lanjutkan ke rute yang diminta
        }

        // Jika tidak ada data pesan, arahkan kembali ke rute lain (misalnya, beranda)
        return redirect()->route('contact'); // Ganti 'home' dengan rute yang sesuai
    }
}
