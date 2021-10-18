<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends AppModel
{
    use HasFactory;
    protected $fillable = [
        'send_from',
        'send_to',
        'message',
        'image'
    ];

    public function send_from(){
        return $this->hasMany(User::class,'id','send_from');
    }
    public function send_to(){
        return $this->hasMany(User::class,'id','send_to');
    }
}
