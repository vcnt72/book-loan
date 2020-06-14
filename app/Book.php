<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'isbn', 'publisher', 'writer', 'content', 'user_id'];


    public function borrows()
    {
        return $this->hasMany('App\Borrow');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
