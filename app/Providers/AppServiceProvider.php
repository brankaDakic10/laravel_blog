<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // dodaj -da vrati tagove
      view()->composer('layouts.master', function($view){
        //   izvuci sve tagove iz baze i nasetuj ih na view
          $tags=\App\Tag::has('posts')->get();

          $view->with(compact('tags'));
      });
      ///
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
