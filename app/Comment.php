<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    dodaj
    protected $fillable=[ 
        //  kao u tabeli
        'text'
];
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
