<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // def relaciju
   public function posts()
   {
       return $this->belongsToMany('App\Post');
   }

   public function getRouteKeyName()
   {        
        //   ime kolone iz nase tabele
       return 'name';
   }
}
