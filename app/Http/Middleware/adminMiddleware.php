<?php

namespace App\Http\Middleware;

use Closure;

class adminMiddleware
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
         $admUsuario=\Auth::User();
        if ($admUsuario->tipo!="admin") {
          return redirect('vista')->with('msj',"No tienes suficiente privilegios para acceder a esta seccion");
        }
        
        return $next($request);
    }
}
