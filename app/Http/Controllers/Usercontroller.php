<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public  function registerUser  (Request $req) {
    $validate = Validator::make($req->all(),[
        'fullname' => 'required|min:10 |max:30',
        'email' => 'required|email|unique:users',
        'phone_number' => ['required','unique:users','max:11'],
        'password' => 'required|min:6|max:10|alpha_dash',
    ]);

    if($validate->fails()){
        // return view('home')->with('errors', $validate->errors());
        return back()->withErrors($validate)->withInput();
    }else{
        $user = new User;
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->phone_number = $req->phone_number;
        $user->password =hash::make ($req->password);
        $user->save();
    }



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
        $details = $req->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if(auth::attempt($details)){
            $req->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'password is not correct.',

        ])->withInput();
    





        //      // this for row
        // return User::get();   
        //     // this for array
        // return User::all();
        // // condition(where, what); it returns the first value that matches the condition
        // User::where('lastname','adebayo')->first();    

        // // return an array of all the values that matches the condition
        // User::where('lastname','adebayo')->get();

                       //before
        // $user = User::where('email',$req->email)->first();
        // if($user){
        //     $verifyPassword = password_verify($req->password, $user->password);
        //     if($verifyPassword){
        //         // return 'Login successful';
        //         return redirect('/dashboard');
        //     }else{
        //         return view('login')->with('message',"Invalid password");
        //     }
        // }else{
        //     return view('login')->with('message',"Invalid email or not registered");
        // }

    }
       
    public function resetPassword (Request $req) {
            
            // User::where('email',$req->email) ->update([
            //             'password' => $req ->password 
                // 'password' => Hash::make($req->password)
            // ]);
            // return redirect('login');
    $user = User::where('email', $req->email)->update([
        // 'password' => $req->password
        'password' => Hash::make($req->password)

    ]);
    if(!$user){
        return redirect()->back()->with([
            'message' => 'Invalid email or not registered',
            'message_timeout' => 3000
        ]);
    }else{
        return redirect('login');
    }
   
        }

        public function uploadPicture(Request $req) {
        //    return $req->profile_picture;
        $file = $req->file('profile_picture');
        // $name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $userId = Auth::id();
        $newProfilePicture = time().$userId.'.'.$extension;
        $storePicture = $req->file('profile_picture')->storeAs('public/profile_picture', $newProfilePicture);
        if($storePicture){
            $updateProfilePIc = User::where('id', $userId)->update([
                'profile_picture' => $newProfilePicture
            ]);
            if($updateProfilePIc){
                // return view('dashboard')->with('message', 'Profile picture updated successfully')->with('status', true);
                return redirect('/dashboard');
            }else{
                return view('dashboard')->with('message', 'Profile picture not updated')->with('status', false);
            
            }
        }
        // return $storePicture;
        // return $newProfilePicture;
        // Auth::id();
        // Auth()->user()->id;
        // return $name;
        // return $extenson;

        
        }

        public function logout(Request $req){
            Auth::logout();
            $req->session()->invalidate();
            $req->session()->regenerateToken();
            return redirect('/login');
        
        }

}