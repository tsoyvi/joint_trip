<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'messages',
        'from_user_id',
        'to_user_id',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_messages', 'id', 'from_user_id');
    }

    /*
    public function message()
    {
        return $this->belongsToMany(Message::class, 'user_messages', 'id', 'message_id');
    }
    */
}
