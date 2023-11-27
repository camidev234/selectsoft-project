<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

            if($user->role_id == 1) {
                return redirect()->route('user.index');
            } else if($user->role_id == 2) {
                return redirect()->route('selector.index');
            } else if($user->role_id == 3){
                return redirect()->route('recruiter.index');
            } else if ($user->role_id == 4) {
                return redirect()->route('instructor.index');
            }
            }
        }

        return $next($request);
    }
}
