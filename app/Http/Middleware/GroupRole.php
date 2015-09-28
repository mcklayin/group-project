<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class GroupRole
{
    protected  $auth;
    protected  $response;

    public function __construct(Guard $auth,
                                ResponseFactory $response)
    {
        $this->auth = $auth;
        $this->response = $response;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check())
        {

            $user_id = $this->auth->user()->id;
            $roles = DB::table('user_roles')->where('user_id','=',$user_id)->lists('role_id','role_id');

            $arr = array(1,2,4);
            if(Config::get('app.allow_users_upload_files'))
                $arr[] = 3;

            if(array_intersect($arr, $roles))
            {
                return $next($request);
            }


        }
        return $this->response->redirectTo('/');
    }
}
