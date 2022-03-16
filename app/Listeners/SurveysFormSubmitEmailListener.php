<?php

namespace App\Listeners;

use App\Events\SurveysFormSubmitEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SurveysFormSubmitMailer;

class SurveysFormSubmitEmailListener
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
     * @param  \App\Events\SurveysFormSubmitEvent  $event
     * @return void
     */
    public function handle(SurveysFormSubmitEvent $event)
    {
        \Mail::to($event->receiver_email)->send(
            new SurveysFormSubmitMailer($event->receiver_name, $event->receiver_email)
        );
    }
}
