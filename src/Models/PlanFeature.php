<?php

namespace Alalm3i\LaravelSubscription\Models;

use Alalm3i\LaravelSubscription\Contracts\PlanFeatureInterface;
use Alalm3i\LaravelSubscription\Database\Factories\PlanFeatureFactory;
use Alalm3i\LaravelSubscription\Traits\BelongsToPlan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model implements PlanFeatureInterface
{
    use BelongsToPlan;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_id',
        'code',
        'value',
        'sort_order',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at',
    ];

    protected static function newFactory()
    {
        return new PlanFeatureFactory;
    }

    /**
     * Get feature usage.
     *
     * This will return all related
     * subscriptions usages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usage()
    {
        return $this->hasMany(config('laraplans.models.plan_subscription_usage'));
    }
}
