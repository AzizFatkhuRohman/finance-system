<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Coba autentikasi
        try {
            $request->authenticate();

            // Regenerasi session jika autentikasi berhasil
            $request->session()->regenerate();

            // Redirect ke halaman dashboard jika login berhasil
            return redirect()->intended(route('dashboard', absolute: false));
        } catch (\Illuminate\Auth\AuthenticationException $e) {
            // Jika autentikasi gagal, redirect kembali ke form login dengan error
            return back()->withErrors([
                'email' => 'Autentikasi gagal, kesalahan kredensial',
            ]);
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
