<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    //
    public function index(){
        $costs = (new Cost())->with('user')->get();
        return view('cost.index',compact('costs'));
    }
}
