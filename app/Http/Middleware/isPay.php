<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isPay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->user_trial > date('Y-m-d') && $request->user()->billing_ends > date('Y-m-d')) {
            return $next($request);
        } else {
            return redirect()->route('sub')->with([
                "error" => "you have to subscribe "
            ]);
        }
        
    }
}
