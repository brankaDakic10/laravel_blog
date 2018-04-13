<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegisterController extends Controller
{
    // middleware
    public function __construct()
    {        
                    //   ime middleware
        $this->middleware('guest');
        // added custom midd     only for store method
        $this->middleware('age',['only'=>'store']);
    }
  public function create(){
      return view('register.create');
  }

  public function store(){

      $this->validate(request(),[
          'name'=>'required',
                                    //   users tabela
          'email'=>'required|email|unique:users',
          'password'=>'required|min:6'
      ]);
//   unos novog korisnika u bazu
$user=new User();
$user->name=request('name');
$user->email=request('email'); 
            //    za cript passworda u bazi
$user->password=bcrypt(request('password'));
$user->save();
            // dodaj korisnika
auth()->login($user);

//sesija
session()->flash('message',
'You have successfully!Thank you for registering!');

return redirect('/posts');

  }



}
