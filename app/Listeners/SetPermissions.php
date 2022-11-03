<?php

namespace App\Listeners;

use App\Events\PostCreation;
use App\Models\User;
use App\Permissions\UserPost;

class SetPermissions
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
     * @param  \App\Events\PostCreation  $event
     * @return void
     */
    public function handle(PostCreation $event)
    {
        $permManager = new UserPost($event->user, $event->post);
        $permManager->up();
    }
}
