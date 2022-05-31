<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    //use HasApiTokens, HasFactory, Notifiable;
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'birth_day',
        'city',
        'phone_number',
        'messengers',
        'login',
        'email',
        'password',
        'image_link',
        'about_me',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /*
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    */
    public function userTripPassenger()
    {
        return $this->belongsToMany(Trip::class)->with(['user_driver'])
        ->withPivot(['id', 'place_count', 'completed']);
    }

    public function message()
    {
        return $this->belongsToMany(Message::class, 'message_user', 'from_user_id', 'message_id');
    }
    
}
