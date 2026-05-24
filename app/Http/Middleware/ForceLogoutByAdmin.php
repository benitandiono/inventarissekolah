<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ForceLogoutByAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Jika admin memaksa logout
            if ($user->force_logout_at) {
                $loginTime = $request->session()->get('login_at');

                if (!$loginTime || strtotime($user->force_logout_at) > $loginTime) {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    return redirect('/login')
                        ->withErrors(['login' => 'Sesi login Anda telah direset oleh admin']);
                }
            }
        }

        return $next($request);
    }
}