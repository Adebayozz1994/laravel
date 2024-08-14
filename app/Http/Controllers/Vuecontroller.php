<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Vuecontroller extends Controller
{
    
    // public function registerFromVue(Request $req){
    //     return response()->json([
    //         'message' => 'Register from vue',
    //         'status' => true
    //     ]);
    
    // }

    public  function registerFromVue  (Request $req) {
        $validate = Validator::make($req->all(),[
            'fullname' => 'required|min:5 |max:30',
            'email' => 'required|email|unique:users',
            'phone_number' => ['required','unique:users','max:11'],
            'password' => 'required|min:6|max:10|alpha_dash',
        ]);

        if($validate->fails()){
            return response()->json([
                'message' => $validate->errors(),
                'status' => false
            ]);
        }else{
            $registerUser = User::create([
                'fullname' => $req->fullname,
                'email' => $req->email,
                'phone_number' => $req->phone_number,
                'password' => Hash::make ($req->password),
            ]);
        }
        if($registerUser){
            return response()->json([
                'message' => 'User registered successfully',
                'status' => true
            ]);
        }else{
            return response()->json([
                'message' => 'User not registered',
                'status' => false
            ]);
        }
    }

}

