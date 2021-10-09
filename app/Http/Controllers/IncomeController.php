<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    //
    public function income()
    {
        # code...
        return view('income.add');
    }
   
}
