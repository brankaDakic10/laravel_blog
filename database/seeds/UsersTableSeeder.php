<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        
        // pozovi ovaj factory  // br laz.podataka
       factory(App\User::class,20)->create();
    }
}
