@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<div class="container">
  <h1 class="header-text-login">Login</h1>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
      <label for="email">Email: </label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email..." />
    </div>
    <div class="form-group">
      <label for="password">Password: </label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Enter password..." />
    </div>
    <button type="submit" class="btn btn-pink">Login</button>
  </form>
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