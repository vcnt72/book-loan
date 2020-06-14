<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Borrow;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $books = Book::all()->take(6);
        if (Auth::user()) {
            $books_loaned = Book::whereHas('borrows', function (Builder $query) {
                $query->whereHas('user', function (Builder $query) {
                    $query->where('id', Auth::user()->id);
                });
            })->get();
            return view('home')->with(['books' => $books, 'books_loaned' => $books_loaned]);
        }
        return view('home')->with(['books' => $books]);
    }
}
