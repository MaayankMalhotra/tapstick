<?php

namespace App\Services\Shipping;

use App\Models\OrderFulfillment;
use App\Models\Vendor;

interface ShippingProvider
{
    public function syncPickupLocation(Vendor $vendor): array;

    public function createShipment(OrderFulfillment $fulfillment): array;

    public function generateLabel(string $shipmentId): array;

    public function requestPickup(string $shipmentId): array;

    public function trackByAwb(string $awbCode): array;
}
