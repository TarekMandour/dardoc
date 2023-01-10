<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminVacationDetail extends Model
{
    protected $fillable = [
        'admin_vacation_id', 'note', 'photo'
    ];

    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/vacation') . '/' . $image;
        }
        return "";
    }

    public function setPhotoAttribute($image)
    {
        if (is_file($image)) {
            $img_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/vacation'), $img_name);
            $this->attributes['photo'] = $img_name;
        }
    }
}
