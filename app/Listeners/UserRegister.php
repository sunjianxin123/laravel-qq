<?php

namespace App\Listeners;

use App\Events\UserRegister as UR;
use APP\Mailer\UserMailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegister
{
    public $userMailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserMailer $userMailer)
    {
        $this->userMailer = $userMailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegister  $event
     * @return void
     */
    public function handle(UR $event)
    {
        $this->userMailer->welcome($event->adminUser);
    }
}
