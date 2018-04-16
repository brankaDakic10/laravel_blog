<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
    // prolazi kroz sve postove,izlistaj i zakaci 6 komentara na jedan post
        App\Post::all()->each(function (App\Post $p){
            $p->comments()->saveMany(factory(App\Comment::class,6)->make());
 
        });
    }
}
