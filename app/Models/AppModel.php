<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppModel extends Model
{
    use HasFactory;
    
    public function saveData($input, $model_id = null)
    {
        // dd($model_id);
        if (empty($model_id)) {
            $model = $this->create($input);
            $model = $model->fresh();
        } else {
            // dd($input);
            $model = $this->updateOrCreate(['id' => $model_id], $input);
            $model->save();
        }
        return $model;
    }
}
