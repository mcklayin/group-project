<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

class Language extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    /**
     * The rules for email field, automatic validation.
     *
     * @var array
     */
    private $rules = [
            'name'      => 'required|min:2',
            'lang_code' => 'required|min:2',
    ];

    public function getImageUrl($withBaseUrl = false)
    {
        if (!$this->icon) {
            return;
        }

        $imgDir = '/images/languages/'.$this->id;
        $url = $imgDir.'/'.$this->icon;

        return $withBaseUrl ? URL::asset($url) : $url;
    }
}
