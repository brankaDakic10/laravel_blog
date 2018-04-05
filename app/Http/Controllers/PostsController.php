<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
 {       
      // index     namenjene za prikaz svih podataka jednog resursa(posts)
   public function index()
   {
           //   naziv same metode iz Post.php getPublished()
           $posts=Post:: getPublished();
           return view('posts.index',compact(['posts']));
           
   }

   public function show($id)
   {
         $post=Post::find($id);
    
        return view('posts.show',compact(['post']));
   }


}


