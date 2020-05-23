@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/change-password.css') }}">
@endsection

@section('content')
    <h1 class="header-text-change-password">Change Password</h1>
    <form method="POST" action="{{ route('changePassword', ['id'=> $user->id]) }}">
      @csrf
      <div class="form-group">
        <label>Old Password: </label>
        <input
          type="password"
          name="old_password"
          class="form-control"
          id="old_password"
          placeholder="Old Password..."
        />
      </div>

      <div class="form-group">
        <label>New Password: </label>
        <input
          type="password"
          class="form-control"
          id="new_password"
          name="new_password"
          placeholder="New Password..."
        />
      </div>
      <button type="submit" class="btn btn-pink mb-5">Submit</button>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
  
      @if (Session::has('success'))
      <div class="alert alert-success">
       {{Session::get('success')}}
       </div>
      @endif
    </form>
   
@endsection