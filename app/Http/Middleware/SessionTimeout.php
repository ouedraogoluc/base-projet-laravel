<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    protected $timeout = 1800; // 30 minutes en secondes

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = session('lastActivityTime');
            if ($lastActivity && (time() - $lastActivity > $this->timeout)) {
                Auth::logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect('/login')->with('warning', 'Vous avez été déconnecté pour cause d\'inactivité.');
            }
            session(['lastActivityTime' => time()]);
        }
        return $next($request);
    }
}
