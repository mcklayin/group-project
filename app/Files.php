<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class Files extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $guarded  = array('id');

    protected $table = 'files';

    /**
     * The rules for email field, automatic validation.
     *
     * @var array
     */


}