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
 <div class="form-group">
 <label for="published">Objavi?</label>    
                                                                 <!-- add value here -->
 <input type="checkbox" id="published" name="is_published" class="form-control" value="1">
 </div>
 <div class="form-group">
 <button type="submit" class="btn btn-primary">Submit</button>
 </div>


</form>
</div>
@endsection