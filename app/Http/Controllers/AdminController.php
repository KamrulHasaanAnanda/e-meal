<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userList()
    {
        $userList = (new User())->with('userList','role')->get();
        dd($userList);
        return view('admin.userlist',compact('userList'));
    }
    public function add_user(){
        return view('admin.addUser');
    }

    public function store_user(Request $req){
        $input = $req->all();
        // $name = $req->name;
        dd($input);
        
        return Redirect()->back()->with('success','Category Inserted');


    }
}
