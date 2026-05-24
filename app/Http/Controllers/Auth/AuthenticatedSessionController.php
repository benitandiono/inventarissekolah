<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        // autentikasi email & password
        $request->authenticate();

        $user = Auth::user();

  // ==============================
// 🔒 CEK SINGLE LOGIN (BENAR)
// ==============================
if (
    $user->session_token !== null &&
    $user->session_token !== session()->getId()
) {
    Auth::logout();

    return back()->withErrors([
        'email' => 'Akun ini sedang aktif di perangkat lain.',
    ]);
}

        // buat session baru
        $request->session()->regenerate();

        $token = Str::uuid()->toString();

        // simpan token ke DB
        $user->session_token = $token;
        $user->save();

        // simpan token ke session browser
        $request->session()->put('session_token', $token);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->session_token = null;
            $user->save();
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


public function resetLogin($id)
{
    // ================== DOUBLE SECURITY ==================
    if (Auth::user()->role->name !== 'superadmin') {
        abort(403, 'ANDA TIDAK MEMILIKI AKSES');
    }
    // =====================================================

    $user = User::findOrFail($id);

    $user->update([
        'password'        => Hash::make('password123'),
        'session_token'   => Str::uuid(), // ❗ WAJIB TOKEN BARU
        'remember_token'  => null,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Login user berhasil direset dan user akan logout otomatis'
    ]);
}
}

