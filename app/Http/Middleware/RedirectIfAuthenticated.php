<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
    if ($guard == "staff" && Auth::guard($guard)->check()) {
        return redirect('/home/staff');
    }
    if ($guard == "member" && Auth::guard($guard)->check()) {
        return redirect('/home/member');
    }
    if (Auth::guard($guard)->check()) {
        return redirect('/home');
    }
        return $next($request);
    }
}