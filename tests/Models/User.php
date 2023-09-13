<?php

namespace Alalm3i\LaravelSubscription\Tests\Models;

use Alalm3i\LaravelSubscription\Contracts\PlanSubscriberInterface;
use Alalm3i\LaravelSubscription\Database\Factories\UserFactory;
use Alalm3i\LaravelSubscription\Traits\PlanSubscriber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements PlanSubscriberInterface
{
    use HasFactory;
    use PlanSubscriber;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function newFactory()
    {
        return new UserFactory();
    }
}
