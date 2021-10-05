<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        // dd($user_id);
        $user = User::where('id',$user_id)->with('roles')->get();
        // dd($user[0]->roles[0]->name);
        if($user[0]->roles[0]->name == "admin"){

            return view('admin.index');
        }
        
    }
}
