@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection


@section('content')
<div class="container">
    <h1 class="header-text-register">Register</h1>
    <form action="{{ route('book.update', ['book'=>$book->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title: </label>
            <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}"
                placeholder="Enter title..." />
        </div>
        <div class="form-group">
            <label>ISBN: </label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{$book->isbn}}"
                placeholder="Enter ISBN..." />
        </div>
        <div class="form-group">
            <label>Writer: </label>
            <input type="text" name="writer" class="form-control" id="writer" value="{{$book->writer}}"
                placeholder="Enter Writer..." />
        </div>

        <div class="form-group">
            <label>Publisher: </label>
            <input type="text" class="form-control" id="publisher" name="publisher" value="{{$book->publisher}}"
                placeholder="Enter Publisher..." />
        </div>

        <div class="form-group">
            <label>Content: </label>
            <input type="text" class="form-control" id="content" name="content" value="{{$book->content}}"
                placeholder="Enter Content..." />
        </div>
        <button type="submit" class="btn btn-pink">Submit</button>


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