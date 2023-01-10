<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientNotification extends Model
{
    //

    protected $guarded = [];

    protected $dispatchesEvents = [
        'created'=>'App\Events\NotificationCreated'
    ];
    public function Client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
