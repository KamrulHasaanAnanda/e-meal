<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\income;
use Illuminate\Http\Request;

class CostController extends Controller
{
    //
    public function index(){
        $costs = (new Cost())->with('user')->get();
        $incomes  = (new income())->get();
        foreach($incomes as $income){
            $total_income = 0;
            $total_income +=$income->amount;
            // ->count();
        }
        // $total_income
        // dd($total_income);
        return view('cost.index',compact('costs','total_income'));
    }
}
