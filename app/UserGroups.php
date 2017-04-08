<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    protected $guarded = ['id'];

    protected $table = 'user_groups';

    /*
     * The rules for email field, automatic validation.
     *
     * @var array
     */
}
