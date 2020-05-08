<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
//        if (! $request->expectsJson()) {
//            return route('admin.auth.getLogin');
//        }
    }
    public function handle($request, Closure $next)
    {
//        if($this->auth->guest())
//        {
//            if($request->ajax())
//            {
//                return response('Unauthorized.',401);
//            }
//            else
//            {
//                return redirect()->route('admin.auth.getLogin');
//            }
//        }
//        return $next($request);
        if(Auth::check()&&Auth::user()->level>0)
        {
            return $next($request);
        }else{
            return redirect('auth/login');
        }
    }
}
