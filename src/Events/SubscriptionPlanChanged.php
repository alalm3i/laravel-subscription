<?php

namespace Alalm3i\LaravelSubscription\Events;

use Alalm3i\LaravelSubscription\Models\PlanSubscription;
use Illuminate\Queue\SerializesModels;

class SubscriptionPlanChanged
{
    use SerializesModels;

    /**
     * @var \Laraplans\Models\PlanSubscription
     */
    public $subscription;

    /**
     * Create a new event instance.
     *
     * @param  \Laraplans\Models\PlanSubscription  $subscription
     * @return void
     */
    public function __construct(PlanSubscription $subscription)
    {
        $this->subscription = $subscription;
    }
}
