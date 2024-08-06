@extends('nav')
@section('search')
<form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
@endsection
@section('content')
   <div class="card mx-auto shadow-sm px-2 my-3 col-6">
    <div class="header">
         <h5 class="text-center mx-auto">Signup form</h5>
    </div>
    <div class="card body">
      @if (isset($message))
      <div class="alert alert-success text-center">
         {{$message}}
      </div>
      @endif
            <form action="/register" method="post">
                @csrf
                
                <div class="form group mb-2">
                   <label for="">Full Name</label>
                   <input type="text" class="form-control" placeholder="Enter your full name" name="fullname" id="fullname" >
                   @if ($errors->get('fullname'))
                        <div class="text-danger text-center bold">
                            {{$errors->first('fullname')}}
                        </div>
                   @endif
                </div>

                <div class="form group mb-2">
                    <label for="">Phone number</label>
                    <input type="text" class="form-control" placeholder="Enter your phone number" name="phone_number" id="phone_number" >
                    @if ($errors->get('phone_number'))
                    <div class="text-danger text-center bold">
                        {{$errors->first('phone_number')}}
                    </div>
                     @endif
                 </div>

                <div class="form group mb-2">
                    <label for="">Email Address</label>
                    <input type="text" class="form-control" placeholder="Enter your email address" name="email" id="email" >
                    @if ($errors->get('email'))
                    <div class="text-danger text-center bold">
                        {{$errors->first('email')}}
                    </div>
                    @endif
                 </div>
               
                 <div class="form group mb-2">
                    <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="Enter your password" name="password" id="password" >
                    @if ($errors->get('password'))
                    <div class="text-danger text-center bold">
                        {{$errors->first('password')}}
                    </div>
                    @endif
                 </div>
                 <div class="form group mb-2">
                    <button class="btn btn-primary w-100" type="submit">Sign up</button>
                 </div>
            </form>
    </div>
   </div>
@endsection
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to laravel, {{$username}}</h1>
    <p>my school name is {{$school}}</p>
    <p>my state is {{$state}}</p>
    <p>my state is {{$level}}</p>
    <p>This is laravel 10</p>
</body>
</html> --}}