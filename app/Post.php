<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   public static function getPublished()
    {                 
        //   vrati  samo postove gde je ovo true
       return self::where('is_published',true)->get();
   }
}
