<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable=[ 
                        //  kao u tabeli
        'title','body','is_published'
    ];
   public static function getPublished()
    {                 
        //   vrati  samo postove gde je ovo true
       return self::where('is_published',true)->get();
   }

   public function comments(){
       return $this->hasMany('App\Comment');
   }
   

   public function user(){
    //    connect relation between user and posts
       return $this->belongsTo('App\User');
   }

//  ova  fja se poziva pri kreiranju checkbox u posts-create.blade
   public function tags()
   {
       return $this->belongsToMany('App\Tag');
   }
}
