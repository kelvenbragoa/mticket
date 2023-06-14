<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function city(){
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }

    public function province(){
        return $this->hasOne('App\Models\Province', 'id', 'province_id');
    }

    public function category(){
        return $this->hasOne('App\Models\Category', 'id', 'main_category_id');
    }
    public function secondcategory(){
        return $this->hasOne('App\Models\Category', 'id', 'second_category_id');
    }

    public function status(){
        return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function tickets(){
        return $this->hasMany('App\Models\Ticket', 'event_id', 'id');
    }

    public function protocols(){
        return $this->hasMany('App\Models\Protocol', 'event_id', 'id');
    }

    public function lineups(){
        return $this->hasMany('App\Models\LineUp', 'event_id', 'id');
    }

    public function sells(){
        return $this->hasMany('App\Models\Sell', 'event_id', 'id');
    }

    public function sell_details(){
        return $this->hasMany('App\Models\SellDetails', 'event_id', 'id');
    }

    public function review(){
        return $this->hasMany('App\Models\Review', 'event_id', 'id');
    }

    public function like(){
        return $this->hasMany('App\Models\LikeEvent', 'event_id', 'id');
    }
}
