<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public  function registerUser  (Request $req) {
        $user = new User;
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->phone_number = $req->phone_number;
        $user->password =hash::make ($req->password);
        $user->save();


        return view('home')->with('message',"Details saved successfully");
        // return $req->input('fullname') ;
        // return $req->only([
        //     'fullname',
        //     'email',
        //     'phone'
        // ]) ;
    
    }
}
