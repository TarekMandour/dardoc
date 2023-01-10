<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{

    protected $guarded =[];
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'cat_id');
    }


    public function postgallery()
    {
        return $this->hasMany(PostGallery::class, 'post_id');
    }

    public function setPhotoAttribute($image)
    {
        if (is_file($image)) {
            $img_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $img_name);
            $this->attributes['photo'] = $img_name;
        }
    }
    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/posts') . '/' . $image;
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
}
