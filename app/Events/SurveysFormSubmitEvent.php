<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SurveysFormSubmitEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $receiver_name;
    public $receiver_email;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($receiver_name, $receiver_email)
    {
        $this->receiver_name = $receiver_name;
        $this->receiver_email = $receiver_email;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
