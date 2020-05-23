@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <h1>Profile</h1>
    <div class="profile-body">
      <div class="row">
        <div class="col-5 profile-label">Name:</div>
        <div class="col-2"></div>
        <div class="col-5">{{$user->name}}</div>
      </div>
      <div class="row">
        <div class="col-5 profile-label">Email:</div>
        <div class="col-2"></div>
        <div class="col-5">{{$user->email}}</div>
      </div>
      <div class="row">
        <div class="col-5 profile-label">Status:</div>
        <div class="col-2"></div>
        <div class="col-5">{{$user->role->name}}</div>
      </div>
      <div class="row">
        <div class="col-5 profile-label">Password:</div>
        <div class="col-2"></div>
        <div class="col-5">
          <a href="{{ route('viewChangePassword') }}" role="button" class="btn btn-pink">change</a>
        </div>
      </div>
      <div class="row">
        <div class="col-2"></div>
        <div class="col-2">
          <button onclick="location.href = `/update-profile` " class="update-profile-btn btn btn-pink">
            update
          </button>
        </div>
        <div class="col-2"></div>
        <div class="col-2"></div>
        <div class="col-5"></div>
      </div>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
    </div>
@endsection