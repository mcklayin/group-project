<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserSettings extends Model
{
    public static function getKeyValue($user_id=0, $key=''){

        $settings = array();
        $settings = Session::get('user_settings');

        if(!empty($settings))
            return $settings;


        if(!$user_id)
            $user_id = Auth::user()->id;

        $data = UserSettings::where('user_id','=',$user_id);

        if($key)
        {
            $data->where('key','=',$key);
        }

        $params = $data->get();

        foreach($params as $k=>$v)
        {
            $settings[$v['key']] = $v['value'];
        }

        if($settings)
        {
            Session::put('user_settings', $settings);
        }
        return $settings;


    }
}
