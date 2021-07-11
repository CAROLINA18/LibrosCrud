<?php

namespace App\Http\Middleware;

use Closure;

class ApiKeyLaika
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
        //si en la url no se recibe  api_key_laika esta genera error 401.
        if (!$request->has("api_key_laika")) {
            return response()->json([
              'status' => 401,
              'message' => 'Acceso Negado',
            ], 401);
          }
      
        //Si se recibe api_key_laika en la ruta pero no es igual al api_key definido retorna error 401
        if ($request->has("api_key_laika")) {
            $api_key = "225a46ad-cb90-4801-8c64-dc2c00820b4a";
            if ($request->input("api_key_laika") != $api_key) {
              return response()->json([
                'status' => 401,
                'message' => 'Acceso Negado',
              ], 401);
            }
          }
      
        return $next($request);
    }
}
