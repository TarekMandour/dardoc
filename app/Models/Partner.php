<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Partner extends Model
{
    protected $fillable = [
        'title', 'title_en', 'link', 'photo'
    ];

    public function getAppendTitleAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->title;
        } else {
            return $this->title_en;
        }
    }

    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/partners') . '/' . $image;
        }
        return "";
    }
}
