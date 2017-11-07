<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;

class authJWT
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

      try {
        if (! $user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found'], 404);
            }


        }catch (TokenExpiredException $e) {

             // do whatever you want to do if token is expired
             $newToken = JWTAuth::parseToken()->refresh();
               return response(['status'=>'token Expired' , 'newToken'=>$newToken]);

        } catch (TokenInvalidException $e) {

             // do whatever you want to do if token is invalid
             return response()->json(['error'=>'Token is invalid']);

        } catch (JWTException $e) {

             // do whatever you want to do if token is not present
            return response()->json(['error'=>'token not Provided']);
        }

        return $next($request);

      }


}
