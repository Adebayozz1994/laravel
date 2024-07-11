<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
use App\Http\Controllers\Usercontroller;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    $username = "ogunlade adebayo" ;
    $school = "SQI" ;
    // with method
    // return view('home')->with('username', $username) ;
    // compact method
    // return view('home', compact("username", "school")) ;
    // direct method
    return view('home', [
         "username" => 'ogunlade adebayo',
        "school" => 'SQI',
        "state" => "lagos",
        "level" => "500 level"
    ]);
    // return "hello world" ;
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('/register',[UserController::class, 'registerUser']);
// Route::post('/login',[UserController::class, 'loginUser']);
Route::get('/login', function () {
    return view('login');
});
    

