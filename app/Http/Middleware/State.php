<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Role;

class State
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

        if($role->locked()) abort('403');
        if(!$role->authorized()) abort('402');
        if($role->mustResetPassword() && $request->path() != 'users/reset_password' && $request->path() != 'users/save_password') return redirect('/users/reset_password');

        if(!$role->contactVerified()) {
            session(['target_url' => $request->fullUrl()]);
            return redirect('/users/contact/create');
        }
        return $next($request);
    }
}
