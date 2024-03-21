<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\VideoCreated;


class SendVideoCreatedNotification
{
    /**
     * Create the event listener.
     */

    /**
     * Handle the event.
     */
    public function handle(VideoCreated $event): void
    {
        Notification::route('mail', config('casteaching.admins'))->notify(new VideoCreated($event->video));
    }
}
