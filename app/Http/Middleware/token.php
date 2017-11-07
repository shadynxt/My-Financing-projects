<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions;
use Tymon\JWTAuth\Middleware\BaseMiddleware;

class token extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);


        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Content-Range, Content-Disposition, Content-Description, X-Auth-Token');
        $response->header('Access-Control-Allow-Origin', '*');

        // if ($request->method() != 'OPTIONS') {

            try {

                $token = $this->auth->setRequest($request)->parseToken()->refresh();

                $this->auth->setToken($token); // <-- This one will let request through without blacklist error

            } catch (Exceptions\TokenExpiredException $e) {

                return $this->respond('tymon.jwt.expired', 'token_expired', $e->getStatusCode(), [$e]);

            } catch (Exceptions\JWTException $e) {

                return $this->respond('tymon.jwt.invalid', 'token_invalid', $e->getStatusCode(), [$e]);

            }

            // send the refreshed token back to the client
            $response->headers->set('X-Auth-Token', $token);

        // }

        return $response;
    }
}
