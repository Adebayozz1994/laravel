
@extends('nav')
@section('profile_picture')
    <img src="{{ asset('storage/profile_picture/'.auth()->user()->profile_picture)}}" data-bs-toggle="modal" data-bs-target="#exampleModal" alt="profile_picture" class="profile-picture" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
    {{-- <p class="text-danger">{{auth()->user()->fullname}}</p> --}}
@endsection

@section('content')
@if(isset($message))
    <div class="{{$status ? 'text-success' : 'text-danger'}} mx-auto mt-3 p-3 rounded">
        {{$message}}
    </div>

@endif
    <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Upload profile picture</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- for multiple images --}}
          {{-- <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="profile_picture" id=""  multiple>
            <input type="submit" value="Upload"
          </form> --}}

          {{-- for single image --}}
          <form action="/uploadProfilePic" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile_picture" id="">
        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button class="btn btn-primary" type="submit">Upload</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection