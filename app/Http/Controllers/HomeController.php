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
        $user = User::where('id',$user_id)->with('userList')->get();
        $total_user = count(User::get()) - 1;
        // dd($user[0]->userList->type);
        if($user[0]->userList->type == "admin"){

            return view('admin.index',compact('total_user'));
        }
        
    }
}
