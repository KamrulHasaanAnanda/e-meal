<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendInvitationPasswordMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function userList()
    {
        $users = (new User())->with('userList')->get();
        // dd($users);
        return view('admin.userlist',compact('users'));
    }
    public function add_user(){
        return view('admin.addUser');
    }

    public function store_user(Request $req){
        $input = $req->all();

        $user = new User();
        $password = bin2hex(openssl_random_pseudo_bytes(4));
        $mail_password = $password;
        $password = Hash::make($password);
        $input['password'] = $password;   
        
        $user = $user->saveData($input);
        // dd();
        $input['user_id'] = $user->id;
        $input['type'] = "user";
        $user_Info = (new UserInfo())->saveData($input);
        $data = [
            "name" => $input["name"],
            "password" => $mail_password,
            "email"   => $input["email"]
        ];

        Mail::to(request()->email)->send(new SendInvitationPasswordMail($data));

        return Redirect()->back()->with('success','User Added');


    }
}
