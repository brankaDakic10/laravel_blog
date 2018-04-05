<!-- ovaj view nasledjuje layouts.master (tj title and content)-->
@extends('layouts.master')

@section ('title');
 <!-- menjam -->
Posts 
@endsection



@section ('content')
     
<!-- ovde ubacujem ceo content te stranice,zeljeni html -->
<div class="col-sm-8 blog-main">
        <h1>Posts</h1>
        
       
        @foreach($posts as $post)
          <div class="blog-post">
            <h3 class="blog-post-title"><a href="{{route('single-post',['id'=>$post->id])}}">{{$post->title}}</a></h3>
            <p class="blog-post-meta">{{$post->created_at}}</p>
             <p>{{$post->title}}</p>
          </div><!-- /.blog-post -->
          @endforeach

 </div><!-- /.blog-main -->

 @endsection
 