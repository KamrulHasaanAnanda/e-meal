<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //
    public function meal_system()
    {
        return view('manager.mealSystem');
    }
}
