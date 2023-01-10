<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Offer extends Model
{
    protected $guarded =[];

    public function setPhotoAttribute($image)
    {
        if (is_file($image)) {
            $img_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/offers'), $img_name);
            $this->attributes['photo'] = $img_name;
        }
    }

    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/offers') . '/' . $image;
        }
        return "";
    }

//    public function setQrcodeAttribute($image)
//    {
//        if (is_file($image)) {
//            $img_name = time() . uniqid() . '_offer.' . $image->getClientOriginalExtension();
//            $image->move(public_path('uploads/offers'), $img_name);
//            $this->attributes['qrcode'] = $img_name;
//        }
//    }

    public function getQrcodeAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/offers') . '/' . $image;
        }
        return "";
    }

    public function getAppendSloganAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->slogan;
        } else {
            return $this->slogan_en;
        }
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
