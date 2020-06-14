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
                <th scope="col">Title</th>
                <th scope="col">Publisher</th>
                <th scope="col">ISBN</th>
                <th scope="col">Writer</th>
                <th scope="col">Content</th>
                @if (Auth::user()->role->name === 'member')
                <th scope="col">Add to borrow</th>
                @endif

                @if (Auth::user()->role->name === 'publisher')
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
                @endif
            </tr>
        </thead>
        <tbody>

            @foreach ($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->publisher}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->writer}}</td>
                <td>{{$book->content}}</td>
                @if (Auth::user()->role->name === 'member')
                <td>
                    <form action="{{ route('addToBorrow', ['id' => $book->id ]) }}" method="post">
                        @csrf
                        <button class="btn btn-pink" type="submit">Add</button>
                    </form>
                </td>
                @endif

                @if (Auth::user()->role->name === 'publisher')
                <td>
                    <form action="{{ route('book.destroy', ['book'=>$book->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-pink">delete</button>
                    </form>
                </td>
                <td>
                    <form action="{{ action('BookController@edit', ['id'=> $book->id]) }}" method="GET">
                        <button type="submit" class="btn btn-pink">update</button>
                    </form>
                </td>
                @endif
            </tr>

            @endforeach
        </tbody>
    </table>
    <br />
    <div class="pages">
        {{ $books->links() }}
    </div>
    <br />
    @if (Auth::user()->role->name === 'publisher')
    <form action="{{ route('book.create') }}" method="GET">
        <button type="submit" class="btn btn-pink">Lend a book</button>
    </form>
    @endif
</div>
@endsection