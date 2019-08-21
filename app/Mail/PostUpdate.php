<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostUpdate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user, $post;

    public function __construct(\App\User $user, \App\Post $post)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Post Update From : ' . $this->user->name)->view('emails.posts.update', ['user' => $this->user, 'post' => $this->post]);
    }
}
