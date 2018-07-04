<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEvent implements ShouldBroadcast
{
    // todo : don't forget to implement should broadcast
    use Dispatchable, InteractsWithSockets, SerializesModels ;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user ;
    public $type ;
    public $data ;

    public function __construct( $user , $type , $data )
    {
        $this->user = $user ;
        $this->type = $type ;
        $this->data = $data ;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('test-channel');
    }
}
