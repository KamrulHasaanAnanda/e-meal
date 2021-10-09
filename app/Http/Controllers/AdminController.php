<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendInvitationPasswordMail;
use App\Traits\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Session;

class AdminController extends Controller
{
    use CommonTrait;
    public function userList()
    {
        $user_admin = Auth::id();
        $users = (new User())->where('id','!=',$user_admin)->with('userList')->get();
        // $users = (new User())->with('userList')->get();

        // dd($users);
        return view('admin.userlist',compact('users'));
    }
    public function add_user(){
        return view('admin.addUser');
    }

    public function store_user(Request $req){
        $input = $req->all();

        $validatedData = $request->validate([
            'name' => ['required','min:3','max:255'],
            'password' => ['required','min:8'],
            'email'=> ['required','unique:users'],
            'mobile'=> ['required','min:11'],
        ]);
        if ($validatedData->fails())
        {
            return redirect()->route('admin.addUser')->withErrors($validatedData)->withInput();
        }

        else{
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
            "email"   => $input["email"],
        ];

        Mail::to(request()->email)->send(new SendInvitationPasswordMail($data));

        return Redirect()->back()->with('success','User Added');
    }
}

    public function edit(Request $request,$id){
        $users  = (new User())->where('id',$id)->with('userList')->get();
        // dd($users);
        return view('admin.edit',compact('users'));
    }

    public function update(Request $req,$id){
        $input = $req->all();
        // dd($input);
        $validatedData = $request->validate([
            'name' => ['required','min:3','max:255'],
            'email'=> ['required'],
            'mobile'=> ['required','min:11'],
            'user_img'=> ['required'],
        ]);
        if ($validatedData->fails())
        {
            return redirect()->route('admin.edit')->withErrors($validatedData)->withInput();
        }

        else{
        if($input['user_img']){
            $input['user_img'] = $this->uploadImg(request()->file('user_img'), 'accounts/user_img');
            Session::put('user_img',$input['user_img']);
            $userInfo = (new UserInfo())->saveData($input,$id);
            $user = (new User())->saveData($input,$id);
            return back();
        }else{
            $user = (new User())->saveData($input,$id);
            $userInfo = (new UserInfo())->saveData($input,$id);
            return back();
        }
    }
}
    public function deleteUser($id){
        // User::find($id)->delete();
        // dd($id);
        $user = (new User())->where('id',$id)->delete();

        return Redirect()->back()->with('success','User Deleted');
    }
}
