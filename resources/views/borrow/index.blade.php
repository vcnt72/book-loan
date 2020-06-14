@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/loaning_management.css') }}">
@endsection


@section('content')
<div class="testing">

    <table class="table-bordered">
        <thead class="tableHead">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Publisher</th>
                <th scope="col">Start Loan</th>
                <th scope="col">End Loan</th>
                <th scope="col"> Return </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($borrows as $borrow)
            <tr>
                <th scope="row">{{$no}}</th>
                <td>{{$borrow->book->title}}</td>
                <td>{{$borrow->book->publisher}}</td>
                <td>{{$borrow->created_at}}</td>
                <td>{{$borrow->returned_at === null ? "-" : $borrow->returned_at}}</td>
                <td>
                    <form action="{{ action('BorrowController@returnBook', ['id'=> $borrow->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="btn btn-pink">
                            return
                        </button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
    <br />
    <div class="pages">
        {{ $borrows->links() }}
    </div>
    <br />

</div>

@endsection