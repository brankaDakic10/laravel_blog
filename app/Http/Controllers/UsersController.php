<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{      
                    //    id korisnika
    public function show($id)
    {
        $user=User::find($id);
                                        // moze i compact
        return view('users.show',['user'=>$user]);
    }
}
 