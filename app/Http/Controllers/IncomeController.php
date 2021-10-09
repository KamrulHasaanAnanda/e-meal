<?php

namespace App\Http\Controllers;

use App\Models\income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    //
    public function income()
    {
        # code...
        return view('income.add');
    }
    public function income_store(Request $req)
    {
        $input = $req->all();
        $input['user_id'] = Auth::id();
        $income = (new income())->saveData($input);
        return redirect(route('income.add'))->with('success','Income added');
        # code...
    }
   
}
