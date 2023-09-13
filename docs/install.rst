Installation
============

Composer
--------

.. code-block:: bash

    $ composer require gerardojbaez/laraplans

Service Provider
----------------

Add ``Alalm3i\LaravelSubscription\LaraplansServiceProvider::class`` to your application service providers file: ``config/app.php``.

.. code-block:: php

    'providers' => [
        /**
         * Third Party Service Providers...
         */
        Alalm3i\LaravelSubscription\LaraplansServiceProvider::class,
    ]

Config File and Migrations
--------------------------

Publish package config file and migrations with the following command:

.. code-block:: bash

    php artisan vendor:publish --provider="Alalm3i\LaravelSubscription\LaraplansServiceProvider"

Then run migrations:

.. code-block:: bash

    php artisan migrate

Traits and Contracts
--------------------

Add ``Alalm3i\LaravelSubscription\Traits\PlanSubscriber`` trait and ``Alalm3i\LaravelSubscription\Contracts\PlanSubscriberInterface`` contract to your ``User`` model.

See the following example:

.. code-block:: php

    namespace App\Models;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Alalm3i\LaravelSubscription\Contracts\PlanSubscriberInterface;
    use Alalm3i\LaravelSubscription\Traits\PlanSubscriber;

    class User extends Authenticatable implements PlanSubscriberInterface
    {
        use PlanSubscriber;
