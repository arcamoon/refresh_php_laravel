<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckValueInHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, int $number, string $some): Response
    {
        if ($request->header('token') != '123456') {
            return response()
                ->json(
                    [
                        'message' => 'Acceso denegado',
                        'number' => $number,
                        'some' => $some,
                    ],
                    Response::HTTP_FORBIDDEN
                );
        }
        return $next($request);
    }
}
