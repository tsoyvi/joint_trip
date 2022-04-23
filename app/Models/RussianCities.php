<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RussianCities extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'district',
        'coords_lat',
        'coords_lon',
        'population'
    ];
}
