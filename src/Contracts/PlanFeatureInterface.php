<?php

namespace Alalm3i\LaravelSubscription\Contracts;

interface PlanFeatureInterface
{
    public function plan();

    public function usage();
}
