<div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="#">New features</a>
          <a class="nav-link" href="#">Press</a>
          <a class="nav-link" href="#">New hires</a>
          <a class="nav-link" href="#">About</a>
        </nav>
      </div>
    </div>

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">Laravel Blog</h1> 
      <!-- session start message kljuc -->
        @if($message=session('message'))
        <div class="alert alert-success">
         {{$message}}
        </div>
        @endif
        <!-- end of session -->
        <!-- add -->
        @if(Auth::check())
        <div >{{Auth()->user()->name}}</div>
       
        <!-- add -->
        <a href="/logout">Logout</a>
     <!-- add else  -->
        @else
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        @endif


        <p class="lead blog-description">An example blog template </p>
      </div>
    </div>