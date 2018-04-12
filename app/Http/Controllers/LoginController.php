<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {        
                    //   ime middleware       primeni na sve osim na ovaj except
        $this->middleware('guest',['except'=>'logout']);
    }



   public function logout()
   {   

            //  brise korisnika iz sesije
       auth()->logout();

       return redirect('/posts');
   }


   public function create()
   {
       return view('login.create');
   }


   public function store(){
    if(!auth()->attempt(
        request(['email','password'])
    ))
    {
       return back()->withErrors([
           'message'=>'Bad credentals'
       ]);
    }
    return redirect('/posts');
   }
}
