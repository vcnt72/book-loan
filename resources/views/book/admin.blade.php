@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/admin-management.css') }}">
@endsection

@section('content')
<div id="content">
    <div class="book-collection">
        <h1 class="head-title">E-Book Available</h1>
        <div class="content-flex-container">
            <div class="content-flex-box" style="color: #fd5e8a; ">
                <form>
                    <ul>
                        @foreach ($books as $book)
                        <li class="book-list">
                            <img src="{{ asset('images/book-icon.png') }}" alt=""
                                style="margin-right:  5px; height: 15px" />
                            <div class="book-title">
                                {{$book->title}}
                            </div>
                            <label class="container"></label>
                            <input type="text" name="id" value="{{$book->id}}" hidden>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </form>

                <div class="option-list">
                    <div class="content-flex-container">
                        <div class="option-button">Delete</div>
                        <div class="option-button">Update</div>
                        <div class="option-button">Maintenance</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection