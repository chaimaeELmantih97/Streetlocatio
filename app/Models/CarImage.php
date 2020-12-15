<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $guarded = [];
    protected $fillable = ['car_id', 'image'];
    public function car(){
        return $this->belongsTo(Car::class);
    }
}
