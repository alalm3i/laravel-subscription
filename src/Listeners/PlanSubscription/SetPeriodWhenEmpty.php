<?php

namespace Alalm3i\LaravelSubscription\Listeners\PlanSubscription;

use Alalm3i\LaravelSubscription\Events\SubscriptionSaving;

class SetPeriodWhenEmpty
{
    /**
     * Handle event.
     *
     * @return void
     */
    public function handle(SubscriptionSaving $event)
    {
        // Set period if it wasn't set
        if (! $event->subscription->ends_at) {
            $event->subscription->setNewPeriod();
        }
    }
}
