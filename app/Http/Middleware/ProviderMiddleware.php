<?php

namespace App\Http\Middleware;

use Closure;

class ProviderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // access to admin areas if you have admin role and active
        $user = \Auth::user();

        if ($user->role !== 'provider' || !$user->active())
        {
            session()->flash('error-msg', 'You dont have access to this area');

            return redirect('/');
        }

        return $next($request);
    }
}
