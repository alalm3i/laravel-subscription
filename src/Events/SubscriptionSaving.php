<?php

namespace Alalm3i\LaravelSubscription\Events;

use Alalm3i\LaravelSubscription\Models\PlanSubscription;
use Illuminate\Queue\SerializesModels;

class SubscriptionSaving
{
    use SerializesModels;

    /**
     * @var \Alalm3i\LaravelSubscription\Models\PlanSubscription
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