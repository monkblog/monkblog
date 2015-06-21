<?php

namespace MonkBlog\Http\Middleware;

use Closure;
use Request;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
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
        if( $this->auth->guest() ) {
            if( $request->ajax() ) {
                return response( 'Unauthorized.', 401 );
            }
            else {
                $redirectTo = ( Request::path() != 'admin' && strstr( Request::path(), 'admin/' ) ) ? '?redirect_to=' . urlencode( Request::path() ) : '';

                return redirect()->guest( 'login' . $redirectTo );
            }
        }

        return $next( $request );
    }
}
