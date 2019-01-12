<?php

namespace App\Http\Middleware;

use Closure;

class IpMiddleware
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
        $ip = array('172.21.5.241', '172.21.2.243','172.21.2.241','172.21.2.75','172.21.8.208');
         
        if (!in_array($request->ip(), $ip)) {
            return response()->json([ 'error' => 401, 'message' => 'Anda tidak diizinkan. Ip Anda : .'.$request->ip() ], 401);
        }
        return $next($request);
    }
}
