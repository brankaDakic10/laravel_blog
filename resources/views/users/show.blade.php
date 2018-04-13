<!-- ovaj view nasledjuje layouts.master (tj title and content)-->
@extends('layouts.master')

@section ('title')
 
User
@endsection



@section ('content' )
    
<!-- ovde ubacujem ceo content te stranice,zeljeni html -->
<div class="col-sm-8 blog-main">
 <!-- add name -->
 <h2>{{$user->name}}</h2>
 <div class="pull-left">
 <a href="/posts">Back to posts</a>
 </div>
       <!-- end -->
        
       
        @foreach($user->posts as $post)
          <div class="blog-post">
            <h3 class="blog-post-title"><a href="{{route('single-post',['id'=>$post->id])}}">{{$post->title}}</a></h3>
            <p class="blog-post-meta">{{$post->created_at}}</p>
            <!-- added -->
            <!-- dodaj if(post->user) code ukoliko nemamo ime korisnika
             koji je kreirao post da preskoci taj deo -->
            <p> @if($post->user)<i><a href="#">by {{$post->user->name}}</a></i>@endif</p>
             <p>{{$post->body}}</p>
          </div><!-- /.blog-post -->
          @endforeach

 </div><!-- /.blog-main -->

 @endsection
 