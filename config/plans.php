<?php

return [

    /*
     * The model which handles the plans tables.
     */

    'models' => [

	    'plan' => \IBuildWebApps\Plans\Models\Plan::class,
	    'subscription' => \IBuildWebApps\Plans\Models\PlanSubscription::class,
	    'feature' => \IBuildWebApps\Plans\Models\PlanFeature::class,
	    'usage' => \IBuildWebApps\Plans\Models\PlanSubscriptionUsage::class,

	    'stripeCustomer' => \IBuildWebApps\Plans\Models\StripeCustomer::class,

    ],
    /*
     * Payment methods
     */
    'payment_methods' => [/*'stripe'*/],

//    'stripeTestToken' => env('STRIPE_TEST_TOKEN', 'NO-TOKEN')

];
