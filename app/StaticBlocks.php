<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticBlocks extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');

    protected $table = 'static_blocks';

    /**
     * The rules for email field, automatic validation.
     *
     * @var array
     */

    private $rules = array(
        'text' => 'required|min:25'
    );

}