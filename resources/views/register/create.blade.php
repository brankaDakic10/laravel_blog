@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')
<div class="col-sm-8 blog-main">
<h2>Please register</h2>



<form action="/register" method="POST">
<!-- sluzi za dodavanje key-a od strane laravela,laravelov helper-->
{{csrf_field()}}
 <div class="form-group">
 <label for="name">Name</label>
 <input type="text" id="name" name="name" class="form-control">
 @include('partials.error-message',['fieldTitle'=>'name'])
 </div>
 <div class="form-group">
 <label for="email">Email</label>
 <input type="text" id="email" name="email" class="form-control">
 @include('partials.error-message',['fieldTitle'=>'email'])
 </div>
 <div class="form-group">
 <label for="password">Password</label>
 <input type="password" id="password" name="password" class="form-control">
 @include('partials.error-message',['fieldTitle'=>'password'])
 </div>
 <!-- add -->
 <div class="form-group">
 <label for="age">Age</label>
 <input type="text" id="age" name="age" class="form-control">
 </div>
 <!-- end -->
 <div class="form-group">
 <button type="submit" class="btn btn-primary">Submit</button>
 </div>


</form>
</div>
@endsection