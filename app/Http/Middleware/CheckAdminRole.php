<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminRole
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
        // Verificar si el usuario está autenticado y tiene el rol de administrador
        if ($request->user() && $request->user()->rol !== 'admin') {
            // Si no es administrador, redireccionar o retornar un error según sea necesario
            return redirect('/access-denied'); // Puedes cambiar esto por la URL de la página de acceso denegado
        }

        return $next($request);
    }
}
