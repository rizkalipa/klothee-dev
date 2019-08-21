<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use \App\Post;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('posts.index', function($view)
        {
            $user = auth()->user();

            $postPublished = \App\Post::where('user_id', $user->id)->where('status', 'Publish')->get();
            $postDraft = \App\Post::where('user_id', $user->id)->where('status', 'Draft')->get();

            return $view->with(['postPublished' => $postPublished, 'postDraft' => $postDraft]);
        });
    }
}
