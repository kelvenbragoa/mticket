<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function ticket(){
        return $this->hasOne('App\Models\Ticket', 'id', 'ticket_id');
    }

    public function event(){
        return $this->hasOne('App\Models\Event', 'id', 'event_id');
    }
}
