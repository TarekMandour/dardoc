<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{

    protected $guarded = [];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'parent');
    }


    public function subCategory()
    {
        return $this->hasMany(Category::class, 'parent')->with('Category')->orderBy('id', 'asc');
    }

    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/categories') . '/' . $image;
        }
        return "";
    }

    public function setPhotoAttribute($image)
    {
        if (is_file($image)) {
            $img_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/categories'), $img_name);
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
