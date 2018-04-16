<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        // izlistaj mi svih 20 korisnike i
        //  njihove postove i sacuvaj tj kreiraj novih 5 postova
       App\User::all()->each(function (App\User $u){
           $u->posts()->saveMany(factory(App\Post::class,5)->make());

       });
    }
}
