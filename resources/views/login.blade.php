{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
</body>
</html> --}}
@extends('nav')
@section('search')
<form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
@endsection
@section('content')
<div class="card body">
    @if (isset($message))
    <div class="alert alert-success text-center">
       {{$message}}
    </div>
    @endif
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                            @if ($errors->get('email'))
                            <div class="text-danger text-center bold">
                                {{$errors->first('email')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{old('password')}}">
                            @if ($errors->get('password'))
                            <div class="text-danger text-center bold">
                                {{$errors->first('password')}}
                            </div>
                            @endif
                        </div>
                        <div>
                            <a href="/forgotPassword">forgotPassword</a>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small class="text-muted">Don't have an account? <a href="/home">Sign up</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var messageElement = document.getElementById('alert-message');
        if (messageElement) {
            var timeout = {{ session('message_timeout', 3000) }};
            setTimeout(function() {
                messageElement.style.display = 'none';
            }, timeout);
        }
    });
</script>

@endsection
