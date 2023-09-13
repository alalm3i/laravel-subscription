<?php

namespace Alalm3i\LaravelSubscription;

use Alalm3i\LaravelSubscription\Contracts\PlanFeatureInterface;
use Alalm3i\LaravelSubscription\Contracts\PlanInterface;
use Alalm3i\LaravelSubscription\Contracts\PlanSubscriptionInterface;
use Alalm3i\LaravelSubscription\Contracts\PlanSubscriptionUsageInterface;
use Alalm3i\LaravelSubscription\Contracts\SubscriptionBuilderInterface;
use Alalm3i\LaravelSubscription\Contracts\SubscriptionResolverInterface;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../src/lang', 'laraplans');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../config/laraplans.php' => config_path('laraplans.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../src/lang' => resource_path('lang/vendor/laraplans'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laraplans.php', 'laraplans');

        $this->app->bind(PlanInterface::class, config('laraplans.models.plan'));
        $this->app->bind(PlanFeatureInterface::class, config('laraplans.models.plan_feature'));
        $this->app->bind(PlanSubscriptionInterface::class, config('laraplans.models.plan_subscription'));
        $this->app->bind(PlanSubscriptionUsageInterface::class, config('laraplans.models.plan_subscription_usage'));
        $this->app->bind(SubscriptionBuilderInterface::class, SubscriptionBuilder::class);
        $this->app->bind(SubscriptionResolverInterface::class, SubscriptionResolver::class);

        Event::listen(
            \Alalm3i\LaravelSubscription\Events\SubscriptionSaving::class,
            \Alalm3i\LaravelSubscription\Listeners\PlanSubscription\SetPeriodWhenEmpty::class
        );

        Event::listen(
            \Alalm3i\LaravelSubscription\Events\SubscriptionSaving::class,
            \Alalm3i\LaravelSubscription\Listeners\PlanSubscription\DispatchEventWhenPlanChanges::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        //
    }
}
