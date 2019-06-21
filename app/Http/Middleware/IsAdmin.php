<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponser;
use Closure;

class IsAdmin
{

    use ApiResponser;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

            if (auth('api')->user()->isAdmin()){


                return $next($request);

            }

        return $this->errorResponse('Not Authorized', 503);
    }
}
