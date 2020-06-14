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
                <ul>
                    <li class="book-list">
                        <img src="../Admin Ebook Management/book-icon.png" alt=""
                            style="margin-right:  5px; height: 15px" />
                        <div class="book-title">
                            Harry Potter and the Philosopher's Stone (1997)
                        </div>
                        <label class="container"></label>
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        </label>
                    </li>
                    <li class="book-list">
                        <img src="../Admin Ebook Management/book-icon.png" alt=""
                            style="margin-right:  5px; height: 15px" />
                        <div class="book-title">
                            Harry Potter and the Chamber of Secrets (1998)
                        </div>
                        <label class="container"></label>
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        </label>
                    </li>
                    <li class="book-list">
                        <img src="../Admin Ebook Management/book-icon.png" alt=""
                            style="margin-right:  5px; height: 15px" />
                        <div class="book-title">
                            Harry Potter and the Prisoner of Azkaban (1999)
                            Harry Potter and the Prisoner of Azkaban (1999)
                            Harry Potter and the Prisoner of Azkaban (1999)
                        </div>
                        <label class="container"></label>
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        </label>
                    </li>
                    <li class="book-list">
                        <img src="../Admin Ebook Management/book-icon.png" alt=""
                            style="margin-right:  5px; height: 15px" />
                        <div class="book-title">
                            Harry Potter and the Prisoner of Azkaban (1999)
                        </div>
                        <label class="container"></label>
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        </label>
                    </li>
                    <li class="book-list">
                        <img src="../Admin Ebook Management/book-icon.png" alt=""
                            style="margin-right:  5px; height: 15px" />
                        <div class="book-title">
                            Harry Potter and the Order of the Phoenix (2003)
                        </div>
                        <label class="container"></label>
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        </label>
                    </li>
                    <li class="book-list">
                        <img src="../Admin Ebook Management/book-icon.png" alt=""
                            style="margin-right:  5px; height: 15px" />
                        <div class="book-title">
                            Harry Potter and the Half-Blood Prince (2005)
                        </div>
                        <label class="container"></label>
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        </label>
                    </li>
                    <li class="book-list">
                        <img src="../Admin Ebook Management/book-icon.png" alt=""
                            style="margin-right:  5px; height: 15px" />
                        <div class="book-title">
                            Harry Potter and the Deathly Hallows (2007)
                        </div>
                        <label class="container"></label>
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection