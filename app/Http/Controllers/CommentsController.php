<?php

namespace App\Http\Controllers;
// add use
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
 public function store($post_id){
     $post=Post::find($post_id);

     $this->validate(request(),[
         'text' =>'required|min:15'
     ]);
                                // dodaje u bazu
     $post->comments()->create(request()->all());
     return redirect()->back();
 }
}
