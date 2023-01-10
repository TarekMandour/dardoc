<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminStatusDetail extends Model
{
    protected $fillable = [
        'admin_status_id', 'note', 'photo'
    ];

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
}
