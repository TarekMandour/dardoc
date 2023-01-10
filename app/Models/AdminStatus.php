<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminStatus extends Model
{
    protected $fillable = [
        'admin_id', 'status_id', 'name'
    ];

    public function statusdetails()
    {
        return $this->hasMany(AdminStatusDetail::class, 'admin_status_id');
    }
}
