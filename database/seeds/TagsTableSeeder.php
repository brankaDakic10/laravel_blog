<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values=[
            'Blogging',
            'Freelancing',
            'How to Succeed',
            'Internet Marketing',
            'Miscellaneous'
        ];
        // truncate  brisi podatke iz tag tabele
        App\Tag::truncate();
        foreach($values as $v){
            App\Tag::create([
            'name'=>$v
            ]);
        }


   App\Post::all()->map(function(App\Post $p) use ($values){
    $rndIds = App\Tag::inRandomOrder()->select('id')->take(3)->pluck('id');
       $p->tags()->attach($rndIds);
   

    });
}
}