<?php

namespace App\Http\Controllers;

use App\Models\MealAdd;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    use CommonTrait;
    //
    public function index()
    {
        $meals = MealAdd::get();
        // dd($meals);
        # code...
        return view('manager.meal.index',compact('meals'));
    }

    public function add_meal()
    {
        # code...
        return view('manager.meal.add');
    }
    public function store_meal(Request $req)
    {
        # code...
        $input = $req->all();
        // dd($input);
            $input['meal_img'] = $this->uploadImg(request()->file('meal_img'), 'meals/meal_img');
            $meal = (new MealAdd())->saveData($input);
            // dd($meal);
            return back()->with('success',"Meal has been added");
        }

        public function edit(Request $request,$id){
            $meal  = (new MealAdd())->where('id',$id)->latest()->get();
            // dd($users);
            return view('manager.meal.edit',compact('meal'));
        }

        public function update(Request $req,$id){
            $input = $req->all();
            // dd($input);
            if(!empty($input['meal_img'])){
                $input['meal_img'] = $this->uploadImg(request()->file('meal_img'), 'meal/meal_img');
                $meal = (new MealAdd())->saveData($input,$id);
                return back()->with('success','Meal has been updated');
            }else{
                $meal = (new MealAdd())->saveData($input,$id);

                return redirect(route('manager.meal'))->with('success','Meal has been updated');
            }
        }
        public function deleteMeal($id){
            // User::find($id)->delete();
            // dd($id);
            $user = (new MealAdd())->where('id',$id)->delete();

            return Redirect()->back()->with('success','Meal Deleted');
        }
}