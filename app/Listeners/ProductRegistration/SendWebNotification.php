<?php

namespace App\Listeners\ProductRegistration;

use App\Events\ProductRegistrationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWebNotification
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
     * @param  ProductRegistrationEvent  $event
     * @return void
     */
    public function handle(ProductRegistrationEvent $event)
    {
        //
    }
}
