<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {
        $timeout = 120;
        $lastActivity = session('last_activity');

        if ($lastActivity && Carbon::now()->diffInMinutes($lastActivity) > $timeout) {
            Auth::logout();
            session()->flush();
            return redirect()->route('session.expired');
        }

        session(['last_activity' => Carbon::now()]);
        return $next($request);
    }
}