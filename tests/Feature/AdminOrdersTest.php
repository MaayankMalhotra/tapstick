<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminOrdersTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['is_admin' => true, 'password' => 'example-admin-password']);
    }

    public function test_admin_can_view_orders_and_customers(): void
    {
        $admin = $this->admin();

        $order = Order::create([
            'order_number' => 'TS-ORDERTST1',
            'customer_name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '9876543210',
            'address' => 'Flat 101, Test Street',
            'city' => 'New Delhi',
            'state' => 'Delhi',
            'postal_code' => '110001',
            'subtotal' => 150.00,
            'shipping' => 49.00,
            'total' => 199.00,
            'payment_method' => 'cod',
            'payment_status' => 'cod_pending',
            'status' => 'placed',
        ]);

        $order->items()->create([
            'product_name' => 'Wasted Sticker',
            'unit_price' => 150.00,
            'quantity' => 1,
            'line_total' => 150.00,
        ]);

        // Non-admin rejected
        $this->get('/admin/orders')->assertRedirect('/admin/login');
        $this->get('/admin/customers')->assertRedirect('/admin/login');

        // Admin can view dashboard with order metrics
        $this->actingAs($admin)
            ->get('/admin')
            ->assertOk()
            ->assertSee('Total Orders')
            ->assertSee('TS-ORDERTST1')
            ->assertSee('John Doe');

        // Admin can view orders list
        $this->actingAs($admin)
            ->get('/admin/orders')
            ->assertOk()
            ->assertSee('Customer Orders')
            ->assertSee('TS-ORDERTST1')
            ->assertSee('John Doe')
            ->assertSee('johndoe@example.com');

        // Admin can view order details
        $this->actingAs($admin)
            ->get('/admin/orders/' . $order->id)
            ->assertOk()
            ->assertSee('Order #TS-ORDERTST1')
            ->assertSee('Flat 101, Test Street')
            ->assertSee('Wasted Sticker');

        // Admin can update order status
        $this->actingAs($admin)
            ->put('/admin/orders/' . $order->id, [
                'status' => 'shipped',
                'payment_status' => 'paid',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'status' => 'shipped',
            'payment_status' => 'paid',
        ]);

        // Admin can view customers directory
        $this->actingAs($admin)
            ->get('/admin/customers')
            ->assertOk()
            ->assertSee('Customers')
            ->assertSee('John Doe')
            ->assertSee('johndoe@example.com')
            ->assertSee('1 order');
    }
}
