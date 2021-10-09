<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class income extends AppModel
{
    use HasFactory;
    protected $fillable = [
        'date',
        'user_id',
        'amount',
      
    ];
}
