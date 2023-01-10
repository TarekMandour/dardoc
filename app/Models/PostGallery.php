<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostGallery extends Model
{

    protected $guarded =[];
    public function Post()
    {
        return $this->hasOne('App\Models\Post', 'id', 'post_id');
    }
    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/posts') . '/' . $image;
        }
        return "";
    }

    public function setPhotoAttribute($image)
    {
        if (is_file($image)) {
            $img_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $img_name);
            $this->attributes['photo'] = $img_name;
        }
    }

}
