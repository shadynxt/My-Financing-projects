<?php

namespace App\Http\Middleware;
use App\User;
use Auth;
use Closure;


class ApiAuth
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

          $user = User::where('token', $request->route('token'))->first();
        
          if ($user != null) {
            Auth::login($user);
            return $next($request);
          }
          return response('unauthorized', 401);

      }


}
