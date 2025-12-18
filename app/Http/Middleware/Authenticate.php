<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
protected function redirectTo($request)
{
    if (! $request->expectsJson()) {

        // JIKA AKSES ADMIN → KE LOGIN ADMIN
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login');
        }

        // LOGIN USER BIASA
        return route('login');
    }
}
}
