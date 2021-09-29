<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $roles [name or names of roles to verify]
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
            $roles = is_array($roles)
            ? $roles
            : explode('|', $roles);

            $hasRole = false;
        foreach ($roles as $role) {
            if ($role == auth()->user()->role) {
                $hasRole = true;
            }
        }

        if ($hasRole) {
            return $next($request);
        }

        Auth::logout();
        
        return redirect()->to('/');
    }
}