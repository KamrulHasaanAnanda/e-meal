<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Contracts\Session\Session;
use Session;
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
        $user_first_name = $user[0]->name[0];
        $user_last_name = $user[0]->name[strlen($user[0]->name) - 1];
        $user_name = $user_first_name.$user_last_name;
        // dd($user_name);
        $user_img = $user[0]->userList->user_img ? $user[0]->userList->user_img :"" ;
        $total_user = count(User::get()) - 1;

        Session::put('user_name', ['user_name'=>$user_name], 'user_img',['user_img'=>$user_img]);

        // dd($user[0]->userList->type);
        if($user[0]->userList->type == "admin"){

            return view('admin.index',compact('user_img','user_name','total_user'));
        } else if($user[0]->userList->type == "manager"){

            return view('manager.index',compact('user_img','user_name','total_user'));
        }
        
    }
}
