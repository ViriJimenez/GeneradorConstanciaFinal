<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdministradorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->tipo_usuario == '1') {
            return $next($request);
        }
        if ($request->user()->tipo_usuario == '2') {
            return redirect()->route("inscripcion.index");
        }
        if ($request->user()->tipo_usuario == '3') {
            return redirect()->route("inscripcion.index");
        }
        if ($request->user()->tipo_usuario == '4') {
            return redirect()->route("inscripcion.index");
        }
        return $next($request);
    }
}
