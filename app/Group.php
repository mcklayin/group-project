<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');

    protected  $hidden = array('pivot');

    /**
     * The rules for email field, automatic validation.
     *
     * @var array
     */
    private $rules = array(
        'name' => 'required|min:2',
    );

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_groups');
    }


}