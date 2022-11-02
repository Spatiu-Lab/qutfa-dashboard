<?php

namespace App\Billing;

use Devinweb\LaravelHyperpay\Contracts\BillingInterface;

class HyperPayBilling implements BillingInterface
{
    /**
     * Get the billing data.
     *
     * @return array
     */
    public function getBillingData(): array
    {
        return [
            'billing.street1'   => request()->street1,
            'billing.city'      => request()->city,
            'billing.state'     => request()->city,
            'billing.country'   => "SA",
            'billing.postcode'  => '', 
        ];
    }
}