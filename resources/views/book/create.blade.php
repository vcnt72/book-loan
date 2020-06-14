@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/lending-page.css') }}">
@endsection

@section('content')
<div id="content">
    <p class="title">Lend Book</p>

    <form class="go-bottom" action="{{ route('book.store') }}" method="POST" style="text-align: center">
        @csrf
        <div>
            <input id="name" name="title" type="text" required />
            <label class="content-label" for="book-title">Book Title</label>
        </div>
        <div>
            <input id="phone" name="writer" type="text" required />
            <label class="content-label" for="author-name">Author Name</label>
        </div>

        <div>
            <input id="isbn" name="isbn" type="text" required />
            <label class="content-label" for="isbn">ISBN</label>
        </div>

        <div>
            <input id="content-haha" name="content" type="text" required />
            <label class="content-label" for="content">Content</label>
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