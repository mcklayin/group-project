<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    protected $hidden = ['pivot'];

    /**
     * The rules for email field, automatic validation.
     *
     * @var array
     */
    private $rules = [
        'name' => 'required|min:2',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_groups');
    }
}
