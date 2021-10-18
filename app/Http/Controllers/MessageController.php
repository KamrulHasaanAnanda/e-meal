<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    use CommonTrait;
    //
    public function index(){
        
        return view('message.allMessage');
    }
    public function messages(){
        $messages = Message::where('send_to',Auth::id())->with(['send_from','send_to'])->get();
        // dd($messages);
        return response()->json($messages);

    }

    public function single_message($id){
        // dd($id);
        $single_message = Message::where('id',$id)->get();
        // dd($single_message);
        return view('message.singleMessage',compact('single_message'));
    }

    public function message_view($id)
    { # code...
        $send_to = (new User())->where('id',$id)->get();
        return view('message.add',compact('send_to'));
    }

    public function store_message(Request $req){
        $input = $req->all();
        $input['send_from'] = Auth::id();

        if($input['image']){
            $input['image'] = $this->uploadImg(request()->file('image'), 'message/image');
    
            $store  = (new Message())->saveData($input);
            return back()->with('sucess','Message send successFully'); 
        }else{
            $store  = (new Message())->saveData($input);
            return back()->with('sucess','Message send successFully'); 
        }

        // dd($input);
        $store  = (new Message())->saveData($input);
        return back()->with('sucess','Message send successFully'); 
    }

}
