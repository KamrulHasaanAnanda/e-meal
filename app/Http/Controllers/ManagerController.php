<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\income;
use App\Models\MealAdd;
use App\Models\MealDate;
use App\Models\MealModel;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //
    public function meal_system()
    {
        $meal_schedule = MealModel::get();
        $users = (new User())->whereHas('userList', function($q){
            return $q->where('type','user');
        })->latest()->get();

        $meals = (new MealAdd())->get();

        if(!empty($meal_schedule[0])){
            
            $start = $meal_schedule[0]->start;
            $end = $meal_schedule[0]->end;
            // dd($end_month);
            $dates = $this->getDatesFromRange($start, $end);
            foreach($dates as $date){
                $input['date'] = $date;
                $input['meal_model_id'] = $meal_schedule[0]->id;
                $add_dates = (new MealDate())->saveData($input);
                $add_cost = (new Cost())->saveData($input);
            }
            $show_dates = MealDate::with(['user','meal'])->where('meal_model_id', $meal_schedule[0]->id)->get();
            
            // foreach($show_dates as $s_date){
            //     if($s_date->meal_id !=null){
            //         $meal_id = $s_date->meal_id;
            //         // $meals = implode(",",$meal_id);
            //         // dd( $meal_id);
            //         foreach($meal_id as $id){

            //             $meals = MealAdd::where('id',$id)->get();
            //         }
            //     }
            // }
            // dd($meals);
            return view('manager.mealSystem',compact('meal_schedule','show_dates','users','meals'));

        }else{
            
            return view('manager.mealSystem',compact('meal_schedule'));
        }

      

        // dd($dates);
        
    }

        

    public function store_meal_system(Request $req)
    {
        # code...
        $input = $req->all();
        $add = (new MealModel())->saveData($input);
        return back()->with('success','Added');


    }

    public function delete_meal_system($id)
    {
        # code...
        $meal_system = (new MealModel())->where('id',$id)->delete();
        $meal_dates = (new MealDate())->where('meal_model_id',$id)->delete();

        return back()->with('success','Meal Stoped');
    }


    public function meal_assign(Request $req,$id)
    {
        $input = $req->all();
        // dd($input);
        $meal_add = (new MealDate())->saveData($input,$id);
        $add_cost = (new Cost())->saveData($input,$id);
        return back()->with("success","User has been Assigned");

        // dd($input);
        # code...
    }

    public function meal_update(Request $req,$id){
        $input['meal_id'] = null;
        $input['user_id'] =null;
        $meal = (new MealDate())->saveData($input,$id);

        return back()->with('success','Meal has been updated');
    }

    private function getDatesFromRange($start, $end, $format = 'Y-m-d') {
             
        $array = array();
        $interval = new DateInterval('P1D');
    // dd($end);
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
    
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    
        foreach($period as $date) { 
            $array[] = $date->format($format); 
        }
    
        return $array;

    }
    
}
