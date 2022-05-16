<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'from',
        'date_depart',
        'to',
        'date_arrival',
        'count_pass',
        'place_cost',
    ];

    protected $hidden = [

    ];

    public function user_driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
    public function user_car()
    {
        return $this->belongsTo(UserCar::class, 'driver_id', 'user_id');
    }
    public function user_passenger()
    {
        return $this->belongsToMany(User::class)->withPivot(["place_count"]);
    }

}
