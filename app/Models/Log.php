<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'admin_name', 'admin_id', 'description', 'num', 'name', 'category', 'type'
        , 'action_date', 'start_date', 'end_date', 'days'
    ];
}
