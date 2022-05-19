<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'brand',
        'model',
        'body_type',
        'issue_year',
        'color',
        'engine_capacity',
        'capacity',
        'state_number',     
        'image_link',
    ];
}

