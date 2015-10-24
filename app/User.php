<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $guarded  = array('id');
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'pivot'];

    public function getGroupIdAttribute($value){

        $group = DB::table('user_groups')->select('group_id')->where('user_id','=',$this->id)->first();


        return (isset($group->group_id) ? $group->group_id : '');
        //echo '<pre>';
      //  print_r($value);
       // print_r($group);
      //  die();
    }

    public function setGroupIdAttribute($value){

        DB::table('user_groups')->where('user_id','=',$this->id)->delete();
        DB::table('user_groups')->insert(array('user_id'=>$this->id, 'group_id'=>$value));
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'user_groups');
    }

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role','user_roles');
    }

    /*
     * User Privileges on site
     */
    public function privileges()
    {
        $user_privileges = Session::get('user_privileges');
        if($user_privileges)
            return $user_privileges;

        $roles = $this->roles;
        if($roles)
        {
            $role_id = $roles->first()->id;
            $user_privileges = DB::table('user_privileges')->where('role_id','=',$role_id)->lists('privilege_id','privilege_id');
            Session::put('user_privileges', $user_privileges);

            return $user_privileges;
        }


    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $array = array(
                array(
                    'user_id'=>$user->id,
                    'key' => 'show_group_news_feed',
                    'value'=>1
                ),
                array(
                    'user_id'=>$user->id,
                    'key' => 'show_group_files_feed',
                    'value'=>1
                ),
                array(
                    'user_id'=>$user->id,
                    'key' => 'news_group_feed_count',
                    'value'=>5
                ),
                array(
                    'user_id'=>$user->id,
                    'key' => 'files_group_feed_count',
                    'value'=>5
                ),
            );
            DB::table('user_settings')->insert($array);

            //insert role
            DB::table('user_roles')->insert(array('role_id'=>3, 'user_id'=>$user->id));
        });
    }
}
