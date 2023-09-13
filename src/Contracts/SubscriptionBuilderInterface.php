<?php

namespace Alalm3i\LaravelSubscription\Contracts;

interface SubscriptionBuilderInterface
{
    /**
     * Specify the trial duration period in days.
     *
     * @param  int  $trialDays
     * @return $this
     */
    public function trialDays($trialDays);

    /**
     * Do not apply trial to the subscription.
     *
     * @return $this
     */
    public function skipTrial();

    /**
     * Create a new subscription.
     *
     * @param  array  $options
     * @return \Alalm3i\LaravelSubscription\Models\PlanSubscription
     */
    public function create(array $attributes = []);
}
