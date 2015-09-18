<?php

namespace App\Handlers\Events;


use App\Events\Event;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Session;

class AuthLogoutEventHandler
{
    /**
     * Create the event handler.
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
     * @param  Events $event
     * @return void
     */
    public function handle(User $user)
    {
        Session::forget('user_privileges');
        Session::forget('user_settings');
    }


}