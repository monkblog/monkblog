<?php

namespace MonkBlog\Http\Middleware;

use Closure;
use View;
use Illuminate\Contracts\Auth\Guard;

class LoggedIn
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
     * @param  Guard $auth
     *
     * @return void
     */
    public function __construct( Guard $auth )
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next )
    {
        if( $this->auth->check() ) {
            View::share('logged_in', true);
        }

        return $next( $request );
    }
}
