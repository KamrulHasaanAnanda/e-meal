<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends AppModel
{
    use HasFactory;
    protected $fillable = [
        'send_from',
        'send_to',
        'message',
        'image'
    ];
}
