<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
 {      
         // add middleware
    public function __construct()
    {        
                    //   ime middleware samo za reg korisnike
        $this->middleware('auth',
                //  primenti na metode create i store
        [
                'only'=>['create','store']
                ]
        );
    }     
   


      // index     namenjene za prikaz svih podataka jednog resursa(posts)
   public function index()
   {
        //    dd(auth()->user());
           //   naziv same metode iz Post.php getPublished()
           $posts=Post:: getPublished();
           return view('posts.index',compact(['posts']));
           
   }

   public function show($id)
   {
        //  $post=Post::find($id);
        //        dd($post->comments);
       $post=Post::with('comments')->find($id);
//        $brojKomentara=$post->comments->count();
        return view('posts.show',compact(['post']));
   }
  

   //add new action
   public function create(){

         return view('posts.create');
   }


   //add new action
   public function store(){
        
                //  dd(request()->all());
                //  za jedno polje
                //  dd(request()->get('title'));
                // $post=new Post();
                // $post->title=request()->get('title');
                // $post->body=request()->get('body'); 
                // //   pogledaj ime za ovo polje,def u migraciji za to polje(is_published),
                // //  kod get metode ('name iz forme')
                // $post->is_published=request()->get('published');
                // ///cuva u bazi
                // $post->save();

                
               $this->validate(request(),[
                'title'=>'required',
                'body'=> 'required|min:15'
               ]);
        //      ovo menja sve prethodno
              //  Post::create(request()->all());

        //   Post::create(request()->all());NE moramo dodati zbog middlaware metode drugi nacin
              
        // add new
        $post=new Post();
        $post->title=request()->get('title');
        $post->body=request()->get('body');
        $post->user_id=auth()->user()->id;
        $post->is_published=request()->get('is_published');
        $post->save();
        ///redirekcija
                return redirect()->route('all-posts');
           }
}


