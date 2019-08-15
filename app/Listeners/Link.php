<?php

namespace App\Listeners;

use App\Events\Link as LinkEvent;
use App\Log;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Link implements ShouldQueue
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
     * @param  Link  $event
     * @return void
     */
    public function handle(LinkEvent $event)
    {
        $log = new Log();
        $log->note = Carbon::now()->format('Y-m-d H:i:s').'---'.$event->link->url;
        $log->save();
    }
}
