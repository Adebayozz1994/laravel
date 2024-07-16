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

        return redirect('login');
        // return view('home')->with('message',"Details saved successfully");
        // return $req->input('fullname') ;
        // return $req->only([
        //     'fullname',
        //     'email',
        //     'phone'
        // ]) ;
    
    }


    public function loginUser (Request $req) {
        //      // this for row
        // return User::get();   
        //     // this for array
        // return User::all();
        // // condition(where, what); it returns the first value that matches the condition
        // User::where('lastname','adebayo')->first();    

        // // return an array of all the values that matches the condition
        // User::where('lastname','adebayo')->get();


        $user = User::where('email',$req->email)->first();
        if($user){
            $verifyPassword = password_verify($req->password, $user->password);
            if($verifyPassword){
                // return 'Login successful';
                return redirect('/dashboard');
            }else{
                return view('login')->with('message',"Invalid password");
            }
        }else{
            return view('login')->with('message',"Invalid email or not registered");
        }

       
    }
       
    public function resetPassword (Request $req) {
            
            // User::where('email',$req->email) ->update([
            //             'password' => $req ->password 
            //     // 'password' => Hash::make($req->password)
            // ]);
            // return redirect('login');
    $user = User::where('email', $req->email);
    if ($user) {
        $user->update([
            'password' =>$req->password
        ]);
        // return redirect ('login');
    } else {
        return view('forgotPassword')->with('message',"Invalid email or not registered");
    }
        }

}