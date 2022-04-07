<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    // public function __construct(Guard $auth)
    // {
    //     $this->auth = $auth;
    // }

    public function handle($request, Closure $next)
    {
        if (Auth::user()->role_id !== 1) {

            abort(404);
        }

        return $next($request);
    }
}
