<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends AppModel
{
    use HasFactory;
    protected $fillable = [
        'date',
        'total_cost',
        'user_id',
        'cost_items'
    ];
     public function user()
    {
        return $this->belongsTo(User::class,'user_id');
        # code...
    }
}
