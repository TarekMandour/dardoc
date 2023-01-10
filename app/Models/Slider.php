<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title', 'title_en', 'content', 'content_en', 'link', 'sort'
        , 'photo', 'background'
    ];

    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/sliders') . '/' . $image;
        }
        return "";
    }
    public function getBackgroundAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/sliders') . '/' . $image;
        }
        return "";
    }
}
