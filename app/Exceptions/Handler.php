<?php
namespace App\Exceptions;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Auth;
class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
    
        if ($request->is('staff') || $request->is('staff/*')) {
            return redirect()->guest('/login/staff');
        }
    
        if ($request->is('member') || $request->is('member/*')) {
            return redirect()->guest('/login/member');
        }
        
        // Handle default case
        return redirect()->guest(route('login')); // Replace 'home' with your desired URL or named route
    }
}