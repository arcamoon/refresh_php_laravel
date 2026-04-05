<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = [
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'method' => $request->method(),
            'headers' => $request->headers->all(),
            'body' => json_encode($request->getContent()),
        ];

        Log::info("Solicitud recibida ", $data);

        return $next($request);
    }

    public function terminate(Request $request, Response $response)
    {
        Log::info('respuesta enviada', [
            'status' => $response->getStatusCode(),
            'content' => $response->getContent(),
        ]);
    }
}
