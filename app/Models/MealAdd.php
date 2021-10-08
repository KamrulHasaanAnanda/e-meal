<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealAdd extends AppModel
{
    use HasFactory;
    protected $fillable = [
        'name',
        'meal_img',
    ];
}
