<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealDate extends AppModel
{
    use HasFactory;
    protected $fillable = [
        'date',
        'meal_id',
        'user_id',
        'meal_model_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function meal(){
        return $this->belongsTo(MealAdd::class,'meal_id');
    }
}
