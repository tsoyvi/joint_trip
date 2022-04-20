<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newtrip extends Model
{
    use HasFactory;
    protected $table = 'newtrips';
    public $timestamps = false;
    protected $fillable = [
        'driverId',
        'startingCity',
        'destination',
        'date',
    ];
}
