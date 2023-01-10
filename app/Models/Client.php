<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable ;

    protected $guard = 'admin';
    protected $guarded = [];

    protected $fillable = [
        'name', 'membership_no', 'national_no', 'email', 'phone', 'password', 'photo', 'is_active',
        'jop', 'birth_date', 'register_date', 'type', 'parent_id', 'remember_token'
    ];

    protected $hidden = [
        'password'
    ];

    public function Client()
    {
        return $this->belongsTo(Client::class, 'parent_id');
    }

    public function Followers()
    {
        return $this->hasMany(Client::class, 'parent_id')->orderBy('id', 'asc');
    }

    public function Payments()
    {
        return $this->hasMany(ClientPayment::class, 'client_id');
    }

    public function Debts()
    {
        return $this->hasMany(ClientDebt::class, 'client_id');
    }

    public function Cards()
    {
        return $this->hasMany(ClientCard::class, 'client_id');
    }

    public function Notifications()
    {
        return $this->hasMany(ClientNotification::class, 'client_id');
    }

    public function setPhotoAttribute($image)
    {
        if (is_file($image)) {
            $img_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/clients'), $img_name);
            $this->attributes['photo'] = $img_name;
        }
    }
    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('public/uploads/clients') . '/' . $image;
        }
        return "";
    }

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
