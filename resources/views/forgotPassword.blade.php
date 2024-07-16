@extends('nav')

@section('content')
@if (session('message'))
<div class="alert alert-success text-center" id="alert-message">
   {{ session('message') }}
</div>
@endif
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Reset Password</h3>
                </div>
                <div class="card-body">
                    <form action="/forgotPassword" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your Email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password"  placeholder="Enter New Password">
                        </div>
                        <div class="mb-3">
                            <label for="newpassword" class="form-label">Confirm new Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter new Password">
                        </div>
                       
                        <button type="submit" class="btn btn-primary w-100">Reset</button>
                    </form>
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
