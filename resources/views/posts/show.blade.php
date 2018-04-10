<!-- ovaj view nasledjuje layouts.master (tj title and content)-->
@extends('layouts.master')

@section ('title');
        {{$post->title}} 
@endsection

@section ('content')
<div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">{{$post->created_at}}</p>
             <p>{{$post->body}}</p>
          </div><!-- /.blog-post -->
@if(count($post->comments))
 <hr> 
 <h4>Comments</h4>    
 <ul class="list-unstyled">
  @foreach($post->comments as $comment)
  
  <li>
  <p> 
  {{$comment->text}}
  </p>
   </li>
  @endforeach
 </ul>
@endif
 </div><!-- /.blog-main -->
@endsection



