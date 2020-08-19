<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Request;

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

        //this for prevent tedirecting back to 
        //login page if logged in
        if (!$request->expectsJson()) {
            if (Request::is('admin/*'))
                return route('admin.login');
            else
                return route('login');

        }
    }
}
