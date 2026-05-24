<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SingleSession
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $sessionToken = $request->session()->get('session_token');

            // jika token tidak cocok → paksa logout
            if (!$sessionToken || $user->session_token !== $sessionToken) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/login')->withErrors([
                    'email' => 'Sesi anda telah berakhir.',
                ]);
            }
        }

        return $next($request);
    }
}

