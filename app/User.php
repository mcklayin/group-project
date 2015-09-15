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
    protected $hidden = ['password', 'remember_token'];

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
}
