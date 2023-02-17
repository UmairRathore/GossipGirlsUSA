<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messaging extends Model
{
    use HasFactory;

    protected $table = 'messagings';
    protected $fillable =
        [
            'sender_id',
            'receiver_id',
            'message',
            'status',

        ];
}
