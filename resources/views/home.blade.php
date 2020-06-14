@extends('layouts.app')


@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endsection

@section('content')
@if (Auth::user())
<div class="container user_collection">
    <br />
    <br />
    <div class="row">
        <div class="col-sm recommended_books">
            <h1>Recommended for you</h1>
            <br />
            <div class="books_row">
                @foreach ($books as $book)
                <h3>{{$book->title}}</h3>
                @endforeach
            </div>
        </div>
        <div class="col-sm user_books">
            <h1>Your collection</h1>
            <br />
            <div class="collection_row">
                @foreach ($books_loaned as $book_loaned)
                <h3>{{$book_loaned->title}}</h3>
                @endforeach
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <br>
    <br>
    <div class="title">
        <h1>Recommended for you</h1>
    </div>
    <span class="books_row">
        <br>
        @foreach ($books as $book)
        <h3>{{$book->title}}</h3>
        @endforeach
    </span>
</div>
@endif
@endsection