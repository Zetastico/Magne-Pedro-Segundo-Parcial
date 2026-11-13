<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {



        $authH = $request->header('Authorization');
        if(!$authH){
            return response()->json(['mensaje' => 'token no proporcionado'], 401);
        }

        $jwt = substr($authH, 7);
        $key = env('JWT_SECRET');
        $alg = env('JWT_ALGORITHM');


        try{
            $decoded = JWT::decode($jwt, new Key($key, $alg));

        } catch (\Throwable $e){
            return response()->json(['mensaje' => 'Token invalido'], 401);
        }


        $request->attributes->add(['usuario' => $decoded->data]);
        

        return $next($request);
    }
}
