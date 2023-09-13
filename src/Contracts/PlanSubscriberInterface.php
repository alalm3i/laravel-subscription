<?php

namespace Alalm3i\LaravelSubscription\Contracts;

interface PlanSubscriberInterface
{
    public function subscription($name = 'default');

    public function subscriptions();

    public function subscribed($subscription = 'default');

    public function newSubscription($name, $plan);

    public function subscriptionUsage($subscription = 'default');
}
