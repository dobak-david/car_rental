<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cars extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'marka', 'tipus', 'napAr', 'kep'
    ];

    public function reservation() {
        return $this->belongsTo(Reservations::class, 'auto_id');
    }
}
