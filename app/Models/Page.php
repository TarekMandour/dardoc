<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    protected $fillable = [
        'title', 'title_en', 'phone', 'content', 'content_en', 'meta_keywords', 'meta_description'
        , 'photo', 'photo2', 'lat','lng', 'mission', 'vision', 'why', 'mission_en', 'vision_en', 'why_en'
    ];

    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/pages') . '/' . $image;
        }
        return "";
    }
    
    public function getPhoto2Attribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/pages') . '/' . $image;
        }
        return "";
    }

    public function getAppendContentAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->content;
        } else {
            return $this->content_en;
        }
    }

    public function getAppendTitleAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->title;
        } else {
            return $this->title_en;
        }
    }

    public function getAppendMissionAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->mission;
        } else {
            return $this->mission_en;
        }
    }

    public function getAppendVisionAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->vision;
        } else {
            return $this->vision_en;
        }
    }

    public function getAppendWhyAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->why;
        } else {
            return $this->why_en;
        }
    }

}
