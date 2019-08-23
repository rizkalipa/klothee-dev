<?php

namespace App\Listeners;

use App\Events\PostUpdate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailAuthor
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostUpdate  $event
     * @return void
     */
    public function handle(PostUpdate $event)
    {
        //
    }
}
