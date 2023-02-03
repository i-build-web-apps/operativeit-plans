<?php

return [

    /*
     * The model which handles the plans tables.
     */

    'models' => [

	    'plan' => \Creatydev\Plans\Models\Plan::class,
	    'subscription' => \Creatydev\Plans\Models\PlanSubscription::class,
	    'feature' => \Creatydev\Plans\Models\PlanFeature::class,
	    'usage' => \Creatydev\Plans\Models\PlanSubscriptionUsage::class,

	    'stripeCustomer' => \Creatydev\Plans\Models\StripeCustomer::class,

    ],
    /*
     * Payment methods
     */
    'payment_methods' => [/*'stripe'*/],

//    'stripeTestToken' => env('STRIPE_TEST_TOKEN', 'NO-TOKEN')

];
