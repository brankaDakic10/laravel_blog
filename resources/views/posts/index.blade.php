<!-- ovaj view nasledjuje layouts.master (tj title and content)-->
@extends('layouts.master')

@section ('title')
 
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
            <!-- added -->
            <!-- dodaj if(post->user) code ukoliko nemamo ime korisnika
             koji je kreirao post da preskoci taj deo -->
                                                 <!-- add route here -->
            <p> @if($post->user)<i><a href="{{route('users',['user_id'=>$post->user_id])}}">by {{$post->user->name}}</a></i>@endif</p>
             
             <small>
             @foreach($post->tags as $tag)
                               <!-- name -->
             <a href="{{route('posts-tags',['tag'=>$tag])}}">{{$tag->name}}</a>
             


             @endforeach
             </small>
             
             <p>{{$post->body}}</p>
          </div><!-- /.blog-post -->
          @endforeach
 
 <!-- add for pagination -->
          <nav class="blog-pagination">
                                       <!-- add for disable                        ovaj posts smo def u index metodi   posts->previousPageUrl = za postove dobijene metodom paginate -->
        <a class="btn btn-outline-{{$posts->currentPage()== 1? 'secondary disabled':'primary'}}" href="{{$posts->previousPageUrl()}}">Previous</a>
        <a class="btn btn-outline-{{$posts->hasMorePages()== 1? 'primary':'secondary disabled'}}" href="{{$posts->nextPageUrl()}}">Next</a>
    </nav>


 </div><!-- /.blog-main -->

 @endsection
 