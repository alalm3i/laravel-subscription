<?php

namespace Alalm3i\LaravelSubscription\Listeners\PlanSubscription;

use Alalm3i\LaravelSubscription\Events\SubscriptionPlanChanged;
use Alalm3i\LaravelSubscription\Events\SubscriptionSaving;

class DispatchEventWhenPlanChanges
{
    /**
     * Handle event.
     *
     * @return void
     */
    public function handle(SubscriptionSaving $event)
    {
        $planId = $event->subscription->getOriginal('plan_id');

        // check if there is a plan and it is changed
        if ($planId && $planId !== $event->subscription->plan_id) {
            event(new SubscriptionPlanChanged($event->subscription));
        }
    }
}
