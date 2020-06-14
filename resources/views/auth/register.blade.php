@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection


@section('content')
<div class="container">
  <h1 class="header-text-register">Register</h1>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
      <label>Name: </label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name..." />
    </div>
    <div class="form-group">
      <label>Email: </label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email..." />
    </div>
    <div class="form-group">
      <label>Password: </label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password..." />
    </div>

    <div class="form-group">
      <label>Confirm Password: </label>
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
        placeholder="Confirm Password..." />
    </div>
    <div class="form-group">
      <label>Roles : </label>
      <select class="form-control" name="role">
        <option value="member">Member</option>
        <option value="publisher">Publisher</option>
      </select>
    </div>
    <button type="submit" class="btn btn-pink mb-5">
      {{ __('Register') }}
    </button>

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

</div>
@endsection