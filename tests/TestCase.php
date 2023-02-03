<?php

namespace IBuildWebApps\Plans\Test;

use IBuildWebApps\Plans\Models\Plan;
use IBuildWebApps\Plans\Test\Models\User;
use IBuildWebApps\Plans\Models\PlanFeature;
use Orchestra\Testbench\TestCase as Orchestra;
use IBuildWebApps\Plans\Models\StripeCustomer;
use IBuildWebApps\Plans\Models\PlanSubscription;
use IBuildWebApps\Plans\Models\PlanSubscriptionUsage;

abstract class TestCase extends Orchestra
{
//    protected $invalidStripeToken = 'tok_chargeDeclinedInsufficientFunds';

    public function setUp(): void
    {
        parent::setUp();

        $this->resetDatabase();

        $this->loadLaravelMigrations(['--database' => 'sqlite']);
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->withFactories(__DIR__.'/../database/factories');

        $this->artisan('migrate', ['--database' => 'sqlite']);
    }

    protected function getPackageProviders($app)
    {
        return [
            \IBuildWebApps\Plans\PlansServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => __DIR__.'/database.sqlite',
            'prefix' => '',
        ]);
        $app['config']->set('auth.providers.users.model', User::class);
        $app['config']->set('app.key', 'wslxrEFGWY6GfGhvN9L3wH3KSRJQQpBD');
        $app['config']->set('plans.models.plan', Plan::class);
        $app['config']->set('plans.models.feature', PlanFeature::class);
        $app['config']->set('plans.models.subscription', PlanSubscription::class);
        $app['config']->set('plans.models.usage', PlanSubscriptionUsage::class);
        $app['config']->set('plans.models.stripeCustomer', StripeCustomer::class);
    }

    protected function resetDatabase()
    {
        file_put_contents(__DIR__.'/database.sqlite', null);
    }

//    protected function initiateStripeAPI()
//    {
//        return Stripe::setApiKey(config('plans.stripeTestToken'));
//    }

//    protected function getStripeTestToken(): ?int
//    {
//        $this->initiateStripeAPI();
//
//        $token = StripeToken::create([
//            'card' => [
//                'number' => '4242424242424242',
//                'exp_month' => 1,
//                'exp_year' => 2030,
//                'cvc' => '999',
//            ],
//        ]);
//
//        return $token->id;
//    }

//    protected function getInvalidStripeToken()
//    {
//        return $this->invalidStripeToken;
//    }
}
