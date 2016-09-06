<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductRegistrationEvent extends Event implements ShouldBroadcast
{
    // use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $name;

    public $stock;

    public $price;

    public function __construct(array $payload)
    {
        $this->name=$payload['name'];
        $this->stock=$payload['stock'];
        $this->price=$payload['price'];
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['product_registration'];
    }
}
