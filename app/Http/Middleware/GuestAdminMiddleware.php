<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(auth()->check() && auth()->user()->is_admin){
            return redirect()->route('admin.dashboard');
        }
        
        if(auth()->check() && !auth()->user()->is_admin){
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
