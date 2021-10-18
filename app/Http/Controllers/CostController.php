<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\income;
use App\Models\MealDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostController extends Controller
{
    //
    public function index(){
        $costs = (new Cost())->with('user')->get();
        $incomes  = (new income())->latest()->get();
        $total_income = 0;
        foreach($incomes as $income){
            $total_income +=$income->amount;
            // ->count();
            // return $total_income;
        }
        // $total_income
        // dd($total_income);
        return view('cost.index',compact('costs','total_income'));
    }
    public function user_cost()
    {
        # code...
        $user_id = Auth::id();
        $meal_assigned = (new MealDate())->where("user_id",$user_id)->with('user','meal')->latest()->get();
        // dd($meal_assigned);
        if(!empty($meal_assigned)){
            
            return view('cost.userCosting',compact('meal_assigned'));
        }else{
            $meal_assigned = "No meal Assigned";
            return view('cost.userCosting',compact('meal_assigned'));

        }
    }
    
    public function update_cost(Request $req, $id )
    {
        $input = $req->all();
        $update_cost = (new Cost())->saveData($input,$id);
        return response()->json($update_cost);
        // dd($input);
        # code...

    
}
}