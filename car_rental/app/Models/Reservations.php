<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'berles_kezdete', 'berles_vege', 'berlo_neve', 'berlo_email', 'berlo_cim', 'berlo_telefon', 'auto_id'
    ];

    public function car() {
        return $this->belongsTo(Cars::class, 'auto_id');
    }
}
