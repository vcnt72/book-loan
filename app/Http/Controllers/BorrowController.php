<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Book;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $borrows = Borrow::whereHas('user', function (Builder $query) {
            $query->where('id', Auth::user()->id);
        })->with('book')->paginate(4);

        return view('borrow.index')->with(['borrows' => $borrows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function addToBorrow($id)
    {
        $book = Book::find($id);

        $borrow = new Borrow([
            'status' => "loan"
        ]);

        $borrow->user()->associate(Auth::user());
        $borrow->book()->associate($book);

        $borrow->save();

        return back()->with('success', 'Book Borrowed');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrow = Borrow::find($id)->delete();
        return redirect()->route('borrow.index')->with('success', 'Borrow Log Deleted');
    }

    public function returnBook($id)
    {
        $dt = new DateTime();
        $borrow = Borrow::find($id);
        $borrow->status = "Returned";
        $borrow->returned_at = $dt;
        $borrow->save();
        return back()->with('success', 'Book Returned');
    }
}
