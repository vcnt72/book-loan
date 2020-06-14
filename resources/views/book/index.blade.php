@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/view-book.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="table-responsive">

    </div>
    <table class="table table-sm table-bordered">
        <thead class="table-head">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Publisher</th>
                <th scope="col">ISBN</th>
                <th scope="col">Writer</th>
                <th scope="col">Content</th>
                <th scope="col">Add to borrow</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($books as $book)
            <tr>
                <td scope="col">{{$no}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->publisher}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->writer}}</td>
                <td>{{$book->content}}</td>
                <td>
                    <form action="{{ route('addToBorrow', ['id' => $book->id ]) }}" method="post">
                        @csrf
                        <button class="btn btn-pink" type="submit">Add</button>
                    </form>
                </td>
            </tr>
            @php
            $no++;
            @endphp
            @endforeach
        </tbody>
    </table>
    <br />
    <div class="pages">
        {{ $books->links() }}
    </div>
    <br />
</div>
@endsection