<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminVacation extends Model
{
    protected $fillable = [
        'admin_id', 'vacation_id', 'name', 'startdate', 'enddate'
    ];

    public function vacationdetails()
    {
        return $this->hasMany(AdminVacationDetail::class, 'admin_vacation_id');
    }
}
