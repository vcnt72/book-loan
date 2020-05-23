@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/update-profile.css')}}">
@endsection


@section('content')
<h1 class="header-text-update-profile">Update profile</h1>
  <form method="POST" action="{{ route('updateProfile', ['id'=> $user->id]) }}">
    @csrf
    <div class="form-group">
      <label>Name: </label>
      <input
        type="text"
        class="form-control"
        id="name"
        name="name"
      value="{{$user->name}}"
        placeholder="Enter name..."
      />
    </div>
    <div class="form-group">
      <label>Email: </label>
      <input
        type="email"
        class="form-control"
        id="email"
        name="email"
        value="{{$user->email}}"
        placeholder="Enter email..."
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