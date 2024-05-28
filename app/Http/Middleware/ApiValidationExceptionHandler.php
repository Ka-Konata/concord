<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ApiValidationExceptionHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        return response()->json([get_class($response)]);

        if ($response instanceof ValidationException) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $response->errors()
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $response;
    }
}
