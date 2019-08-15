<?php

namespace App\Events;

use App\AdminUser;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class UserRegister
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $adminUser;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(AdminUser $adminUser)
    {
        $this->adminUser = $adminUser;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {

    }
}
