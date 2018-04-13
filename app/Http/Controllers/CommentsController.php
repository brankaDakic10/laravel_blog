<?php

namespace App\Http\Controllers;
// add use
use App\Mail\CommentReceived;
// add use
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{
 public function store($post_id){
     $post=Post::find($post_id);

     $this->validate(request(),[
         'text' =>'required|min:15'
     ]);
                                // dodaje u bazu
     $post->comments()->create(request()->all());
    //  added new                    nova instnca ove klase
     Mail::to($post->user)->send(new CommentReceived($post));
     return redirect()->back();
 }
}
