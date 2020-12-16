<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'demande_numero','prenom', 'nom', 'email', 'tel', 'ville', 'cin', 'permis', 'from', 'to', 'car_id','total'
    ];


}
