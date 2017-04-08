<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\ResponseFactory;

class Group
{
    protected $auth;
    protected $response;

    public function __construct(Guard $auth,
                                ResponseFactory $response)
    {
        $this->auth = $auth;
        $this->response = $response;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            if ($this->auth->user()->groups->first()) {
                return $next($request);
            }
        }

        return $this->response->redirectTo('/');
    }
}
