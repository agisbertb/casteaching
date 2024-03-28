<?php

namespace App\Listeners;

use App\Events\VideoCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendVideoCreatedNotification
{
    /**
     * Create the event listener.
     */

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Notification::route('mail', config('casteaching.admins'))->notify(new \App\Notifications\VideoCreated($event->video));
    }
}
