<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Order')->withTimestamps();
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
}
