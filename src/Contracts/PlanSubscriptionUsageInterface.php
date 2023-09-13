<?php

namespace Alalm3i\LaravelSubscription\Contracts;

interface PlanSubscriptionUsageInterface
{
    public function feature();

    public function subscription();

    public function scopeByFeatureCode($query, $feature_code);

    public function isExpired();
}
