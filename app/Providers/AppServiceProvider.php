<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\About;
use View;
use App\Idea;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('about_us')) {
            $about_all = About::all();
            $categories =Category::all();
            $ideas = Idea::with('category', 'city', 'support')->get();
            View::composer('Site.layouts.master', function ($view) use ($about_all, $ideas,$categories) {
                $view->with('about_all', $about_all)->with('ideas', $ideas)
                ->with('categories',$categories);
            });
        }
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
