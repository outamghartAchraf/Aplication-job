<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use RealRashid\SweetAlert\ToSweetAlert;
use Symfony\Component\HttpFoundation\Response;

class NotAllowPayTwice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (env('app.sweet_alert_auto_display_error_messages', true)) {
            if($request->user()->billing_ends > date('Y-m-d')){

            
                return redirect()->route('dashboard')->with([
    
                    'warning' =>'your are a paid member'
    
                ]);

               
            }else{
    
                return $next($request);
    
            }
        }
      
        
    }
}
