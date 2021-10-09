<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function index(){
        return view();
    }

    public function message_view($id)
    { # code...
        // $send_t
        return view('message.add');
    }

    public function store_message(Request $req,$send_to){
        $input = $req->all();
        $input['send_from'] = Auth::id();

        

    }

}
