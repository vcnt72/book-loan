<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'isbn', 'publisher', 'writer', 'content'];


    public function borrows()
    {
        return $this->hasMany('App\Borrow');
    }
}
