@extends('layouts.master')

@section('title')
Create new post
@endsection

@section('content')
<div class="col-sm-8 blog-main">
<h2>Create new post</h2>



<form action="/posts" method="POST">
<!-- sluzi za dodavanje key-a od strane laravela,laravelov helper-->
{{csrf_field()}}
 <div class="form-group">
 <label for="title">Ovo je naslov</label>
 <input type="text" id="title" name="title" class="form-control">
 @include('partials.error-message',['fieldTitle'=>'title'])
 </div>
 <div class="form-group">
 <label for="body">Ovo je body</label>
 
 <textarea class="form-control" id="body"  name="body" ></textarea>
 @include('partials.error-message',['fieldTitle'=>'body'])
 </div>


 <!-- add checkbox for tag -->
 <!-- ukoliko ima tag-ova kreiraj div -->
 @if (count($tags))

  <div class="form-group">
  <label for="tags()">TAGS</label>  <br>

  @foreach($tags as $tag)
  <input type="checkbox" id="tag" name="tag" 
  class="form-control" value="{{$tag->id}}">{{$tag->name}}
  @endforeach
  </div>
 @endif


 <!--  -->
 <div class="form-group">
 <button type="submit" class="btn btn-primary">Submit</button>
 </div>


</form>
</div>
@endsection