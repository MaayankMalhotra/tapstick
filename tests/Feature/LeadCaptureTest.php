<?php

namespace Tests\Feature;

use App\Models\CustomerLead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeadCaptureTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['is_admin' => true, 'password' => 'example-admin-password']);
    }

    public function test_landing_page_renders_lead_modal_and_trigger(): void
    {
        $response = $this->get('/');
        $response->assertOk();
        $response->assertSee('Get 10% Off Your First Drop');
        $response->assertSee('Continue with Google');
        $response->assertSee('lead-modal');
        $response->assertSee('floating-lead-trigger');
    }

    public function test_guest_can_submit_mobile_and_gmail_lead(): void
    {
        $response = $this->postJson('/club/join', [
            'name' => 'Aarav Patel',
            'email' => 'aarav.patel@gmail.com',
            'phone' => '9876543210',
            'auth_provider' => 'mobile_email',
        ]);

        $response->assertOk();
        $response->assertJson([
            'success' => true,
            'discount_code' => 'TAPSTICK10',
            'customer' => [
                'name' => 'Aarav Patel',
                'email' => 'aarav.patel@gmail.com',
                'phone' => '9876543210',
                'provider' => 'mobile_email',
            ],
        ]);

        $this->assertDatabaseHas('customer_leads', [
            'name' => 'Aarav Patel',
            'email' => 'aarav.patel@gmail.com',
            'phone' => '9876543210',
            'auth_provider' => 'mobile_email',
            'discount_code' => 'TAPSTICK10',
        ]);

        // Verify session data was set
        $this->assertEquals('Aarav Patel', session('customer_name'));
        $this->assertEquals('aarav.patel@gmail.com', session('customer_email'));
        $this->assertEquals('9876543210', session('customer_phone'));
    }

    public function test_guest_can_submit_google_lead(): void
    {
        $response = $this->postJson('/club/join', [
            'name' => 'Google Collector',
            'email' => 'collector@gmail.com',
            'auth_provider' => 'google',
        ]);

        $response->assertOk();
        $response->assertJson([
            'success' => true,
            'discount_code' => 'TAPSTICK10',
        ]);

        $this->assertDatabaseHas('customer_leads', [
            'email' => 'collector@gmail.com',
            'auth_provider' => 'google',
            'discount_code' => 'TAPSTICK10',
        ]);
    }

    public function test_admin_can_view_captured_leads_in_customer_directory(): void
    {
        CustomerLead::create([
            'name' => 'Kavya Sharma',
            'email' => 'kavya@gmail.com',
            'phone' => '9811122233',
            'auth_provider' => 'mobile_email',
            'discount_code' => 'TAPSTICK10',
        ]);

        $admin = $this->admin();

        $response = $this->actingAs($admin)->get('/admin/customers');
        $response->assertOk();
        $response->assertSee('Landing Page Leads &amp; Google Sign-ups', false);
        $response->assertSee('Kavya Sharma');
        $response->assertSee('kavya@gmail.com');
        $response->assertSee('9811122233');
    }
}
