<?php

namespace App\Console\Commands;

use App\Models\ShippingShipment;
use App\Services\Shipping\ShippingProvider;
use Illuminate\Console\Command;

class ReconcileShiprocketShipments extends Command
{
    protected $signature = 'shiprocket:reconcile {--limit=25}';
    protected $description = 'Refresh stale Shiprocket shipment tracking data without overloading the provider API';

    public function handle(ShippingProvider $provider): int
    {
        $shipments = ShippingShipment::where('provider', 'shiprocket')
            ->whereNotNull('awb_code')
            ->whereNotIn('status', ['delivered', 'cancelled', 'return_to_origin'])
            ->where(fn ($query) => $query->whereNull('last_synced_at')->orWhere('last_synced_at', '<', now()->subHours(6)))
            ->limit((int) $this->option('limit'))
            ->get();

        foreach ($shipments as $shipment) {
            try {
                $provider->trackByAwb($shipment->awb_code);
                $shipment->update(['last_synced_at' => now(), 'last_error' => null]);
                $this->line('Synced '.$shipment->awb_code);
            } catch (\Throwable $exception) {
                $shipment->update(['last_error' => $exception->getMessage(), 'last_synced_at' => now()]);
                report($exception);
            }
        }

        return self::SUCCESS;
    }
}
