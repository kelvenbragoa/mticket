<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarStore extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sells(){
        return $this->hasMany('App\Models\SellBar', 'bar_store_id', 'id');
    }
 
}
