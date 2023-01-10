<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Setting extends Model
{
    public function getLogo1Attribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/settings') . '/' . $image;
        }
        return "";
    }

    public function getLogo2Attribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/settings') . '/' . $image;
        }
        return "";
    }

    public function getFavAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/settings') . '/' . $image;
        }
        return "";
    }

    public function getBreadcrumbAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/settings') . '/' . $image;
        }
        return "";
    }

    public function getPdfAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/settings') . '/' . $image;
        }
        return "";
    }

    public function getAppendTitleAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->title;
        } else {
            return $this->title_en;
        }
    }

    public function getAppendAddressAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->address;
        } else {
            return $this->address_en;
        }
    }
}
