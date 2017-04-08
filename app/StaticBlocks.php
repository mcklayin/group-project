<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticBlocks extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    protected $table = 'static_blocks';

    /**
     * The rules for email field, automatic validation.
     *
     * @var array
     */
    private $rules = [
        'text' => 'required|min:25',
    ];
}
