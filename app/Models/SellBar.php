<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellBar extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function selldetails(){
        return $this->hasMany('App\Models\SellDetailBar', 'sell_id', 'id');
    }
}
