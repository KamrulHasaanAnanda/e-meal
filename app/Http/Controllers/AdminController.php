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
}
