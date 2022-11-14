<?php

namespace App\Services;


use App\Entity\Donation;
class StripeService
{

    private $privateKey;

    public function __construct()
    {
        // depending on the mode of the env, I get the test or prod key
        if($_ENV['APP_ENV'] === 'dev') {
            $this->privateKey = $_ENV['STRIPE_SECRET_KEY_TEST'];

        } else {
            $this->privateKey = $_ENV['STRIPE_SECRET_KEY_LIVE'];

        }
    }

    public function paymentIntent(Product $product)
    {
        \Stripe\Stripe::setApiKey($this->privateKey);
    }

}