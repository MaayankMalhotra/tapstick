<?php

namespace App\Services;

use Razorpay\Api\Api;

class RazorpayGateway
{
    public function createOrder(array $data): array
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        return $api->order->create($data)->toArray();
    }
}
