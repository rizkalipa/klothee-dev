<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use \App\Post;

class DashboardServiceProvider extends ServiceProvider
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

        View::composer(['components.calendar', 'components.calendar-nodata'], function($view)
        {
            $thisMonth = Carbon::create('Asia/Jakarta');
            $schedule = new \App\Schedule;

            switch( $thisMonth->startOfMonth()->format('D') )
            {
                case('Mon'): $firstDaySpan = 0;
                            break;
                case('Tue'): $firstDaySpan = 1;
                            break;
                case('Wed'): $firstDaySpan = 2;
                            break;
                case('Thu'): $firstDaySpan = 3;
                            break;
                case('Fri'): $firstDaySpan = 4;
                            break;
                case('Sat'): $firstDaySpan = 5;
                            break;
                case('Sun'): $firstDaySpan = 6;
                            break;
            }

            return $view->with(compact('firstDaySpan', 'thisMonth', 'schedule'));
        });
    }
}
