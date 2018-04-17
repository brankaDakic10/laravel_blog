<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// add
use App\Tag;
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
        //        dodaj za paginaciju
        //      postovi sa korisnicima
           $posts=Post::with('user')->latest()->paginate(10);
           //////end
 
        // ovde kacimo na sam post user-a i mozemo da mu pristupimo 
        // preko index.blade-a  $post->user 
        //    $post=Post::with('user')->find(1);
        //    $posts=Post::with('user')->paginate(3);

        //  start  ovo je lazy 
        //    $post=Post::find(1);
        //    $post->user();
           //  end of lazy 

           //    provera koliko ima jos stranica?
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
        // add for tag
        $tags=Tag::all();
         return view('posts.create' ,compact(['tags']));
   }


   //add new action 
//    add code za validaciju checbox-a sa tagovima
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
                'body'=> 'required|min:15',
                //    add code za validaciju checbox-a
                'tags'=> 'required|array'
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
        // $post->is_published=false;
        $post->save();
        //   za ove tagove nakaci izabrane tagove na post,upis u pivot tabelu
        $post->tags()->attach(request('tags'));
        // za prikaz info u laravel.log
        // \Log::info($post->tags()->get());
        ///redirekcija
                return redirect()->route('all-posts');
           }
}


