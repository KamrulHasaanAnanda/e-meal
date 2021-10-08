<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealModel extends AppModel
{
    use HasFactory;
    protected $fillable = [
        'start',
        'end',
        'meal_id',
        'user_id'
    ];
}
