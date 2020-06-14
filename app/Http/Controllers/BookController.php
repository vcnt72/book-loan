<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role->name === 'publisher') {
            $books = Book::whereHas('user', function (Builder $query) {
                $query->where('id', Auth::user()->id);
            })->orderBy('title', 'asc')->simplePaginate(5);
        } else {
            $books = Book::simplePaginate(5);
        }

        return view('book.index')->with(['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $this->validate($request, [
            'title'    =>  'required',
            'isbn'     =>  'required',
            'writer'    =>  'required',
            'content'    =>  'required'
        ]);
        $book = new Book([
            'title'    =>  $request->get('title'),
            'isbn'     =>  $request->get('isbn'),
            'publisher'    =>  Auth::user()->name,
            'writer'    =>  $request->get('writer'),
            'content'    =>  $request->get('content'),
        ]);

        $book->user()->associate(Auth::user());
        $book->save();
        return redirect()->route('book.create')->with('success', 'Book Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit')->with(['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'    =>  'required',
            'isbn'     =>  'required',
            'publisher'    =>  'required',
            'writer'    =>  'required',
            'content'    =>  'required'
        ]);
        $book = Book::find($id);
        $book->title = $request->get('title');
        $book->isbn = $request->get('isbn');
        $book->publisher = $request->get('publisher');
        $book->writer = $request->get('writer');
        $book->content = $request->get('content');
        $book->save();
        return redirect()->route('book.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Book Deleted');
    }

    // public function AddToLoan($BookId)
    // {
    //     // $book = Book::find($BookId);

    //     $loan = new Loan([
    //         'BookId' => $BookId,
    //         'UserId' => null,
    //         'Status' => "Loan"
    //     ]);


    //     $loan->save();
    //     return redirect()->route('book.index')->with('success', 'Book Borrowed');
    // } 
}
