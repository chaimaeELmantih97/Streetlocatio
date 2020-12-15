<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unavailable extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'from',
        'to',
        'car_id'
    ];
}
