<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Medicine extends Model
{
    protected $guarded = [];


    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/status') . '/' . $image;
        }
        return "";
    }

    public function setPhotoAttribute($image)
    {
        if (is_file($image)) {
            $img_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/status'), $img_name);
            $this->attributes['photo'] = $img_name;
        }
    }

    public function getAppendNameAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->name;
        } else {
            return $this->name_en;
        }
    }
}
