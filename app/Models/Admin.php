<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles ;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'photo', 'is_active', 'emp_code', 'cat_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'cat_id');
    }

    public function vacations()
    {
        return $this->hasMany(AdminVacation::class, 'admin_id');
    }

    public function status()
    {
        return $this->hasMany(AdminStatus::class, 'admin_id');
    }

    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/admins') . '/' . $image;
        }
        return "";
    }
}
