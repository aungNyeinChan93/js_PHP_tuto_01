<?php

namespace App\Listeners;

use App\Events\UserEventTest;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserListenerTest
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserEventTest $event)
    {
        //
        Mail::to("User1@gmail.com")->send(new TestMail($event->user));

    }
}
