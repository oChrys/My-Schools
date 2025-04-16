<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // Verifica se o usuário está autenticado
        if (Auth::guard($guard)->guest()) {
            // Caso não esteja autenticado, redireciona para a página de login
            return redirect()->route('login');
        }

        // Caso o usuário esteja autenticado, permite que a requisição continue
        return $next($request);
    }
}
