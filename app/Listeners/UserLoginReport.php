<?php

namespace App\Listeners;

use App\Events\LoginNotify;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class UserLoginReport implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct(\App\User $user)
    { }

    /**
     * Handle the event.
     *
     * @param  LoginNotify  $event
     * @return void
     */
    public function handle(LoginNotify $event)
    {
        \Mail::to('rizky.rahmansyah@klothee.dev')->send(new \App\Mail\EmailAuthor($event->user));
    }
}
