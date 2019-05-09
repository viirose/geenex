<?php

namespace App\Http\Middleware;

use Closure;

use App\Helpers\Role;

class Spare
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
        $role = new Role;

        if(!$role->spare() && !$role->admin()) abort('401');
        return $next($request);
    }
}
