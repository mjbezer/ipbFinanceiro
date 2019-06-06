<?php


namespace App\Http\Middleware;

use Closure;

class Autenticate
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
        
        if($request->session()->get('sessionData') === null){

            return redirect('/login');
        
        }elseif($request->session()->get('sessionData') !== null)

                return $next($request);
    }
}
