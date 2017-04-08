<?php

namespace App\Handlers\Events;

use App\User;
use App\UserSettings;

class AuthLoginEventHandler
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
     * @param Events $event
     *
     * @return void
     */
    public function handle(User $user, $remember)
    {
        UserSettings::getKeyValue();
        $user->privileges();
    }
}
