<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ForceLogoutAfterPasswordReset
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (
                $user->password_changed_at &&
                $request->session()->get('password_confirmed_at') &&
                $user->password_changed_at->timestamp >
                $request->session()->get('password_confirmed_at')
            ) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/login')
                    ->withErrors(['login' => 'Password Anda telah direset oleh admin']);
            }
        }

        return $next($request);
    }
    
}
