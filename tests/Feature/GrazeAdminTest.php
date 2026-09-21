<?php

namespace Tests\Feature;

use App\Models\GrazeInquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GrazeAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_inquiry_can_be_submitted_via_api(): void
    {
        $payload = [
            'fullName' => 'Sarah Jenkins',
            'phone' => '4165551234',
            'email' => 'sarah@example.com',
            'date' => '2026-10-15',
            'city' => 'Oakville, ON',
            'guests' => 35,
            'budget' => '600-1000',
            'eventType' => 'birthday',
            'service' => 'grazing-table',
            'dietary' => 'vegetarian',
            'vision' => 'Outdoor garden party with gold and taupe accents',
        ];

        $response = $this->postJson('/api/graze/inquiry', $payload);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseHas('graze_inquiries', [
            'full_name' => 'Sarah Jenkins',
            'phone' => '4165551234',
            'email' => 'sarah@example.com',
            'city' => 'Oakville, ON',
            'guest_count' => 35,
            'budget' => '600-1000',
            'event_type' => 'birthday',
            'service' => 'grazing-table',
            'dietary' => 'vegetarian',
            'status' => 'new',
        ]);
    }

    public function test_inquiry_validation_requires_phone_email_city_service(): void
    {
        $response = $this->postJson('/api/graze/inquiry', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['phone', 'email', 'city', 'service']);
    }

    public function test_unauthenticated_user_redirected_to_graze_login(): void
    {
        $response = $this->get('/graze-n-gifts/admin');

        $response->assertRedirect('/graze-n-gifts/admin/login');
    }

    public function test_passcode_authenticates_graze_admin(): void
    {
        $response = $this->post('/graze-n-gifts/admin/login', [
            'email' => 'manica@graze.com',
            'password' => 'graze2026',
        ]);

        $response->assertRedirect('/graze-n-gifts/admin');
        $this->assertTrue(session('graze_admin_auth'));

        $dashboard = $this->get('/graze-n-gifts/admin');
        $dashboard->assertStatus(200);
        $dashboard->assertSee('Client Inquiries');
    }

    public function test_tabstick_admin_user_can_access_graze_admin(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@tabstick.in',
            'is_admin' => true,
        ]);

        $inquiry = GrazeInquiry::create([
            'full_name' => 'Michael Scott',
            'phone' => '9055554321',
            'email' => 'michael@dundermifflin.com',
            'event_date' => '2026-11-20',
            'city' => 'Burlington',
            'guest_count' => 50,
            'budget' => '1000-2000',
            'event_type' => 'corporate',
            'service' => 'indo-fusion',
            'status' => 'new',
        ]);

        $response = $this->actingAs($admin)->get('/graze-n-gifts/admin');

        $response->assertStatus(200);
        $response->assertSee('Michael Scott');
        $response->assertSee('Burlington');
        $response->assertSee('indo-fusion');
    }

    public function test_admin_can_update_inquiry_status_and_notes(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $inquiry = GrazeInquiry::create([
            'full_name' => 'Dwight Schrute',
            'phone' => '9055559999',
            'email' => 'dwight@beetfarm.com',
            'city' => 'Scranton',
            'service' => 'high-tea',
            'status' => 'new',
        ]);

        $response = $this->actingAs($admin)->patch("/graze-n-gifts/admin/inquiries/{$inquiry->id}", [
            'status' => 'confirmed',
            'admin_notes' => 'Beet tasting table added, 50% deposit paid.',
        ]);

        $response->assertRedirect();

        $inquiry->refresh();
        $this->assertEquals('confirmed', $inquiry->status);
        $this->assertEquals('Beet tasting table added, 50% deposit paid.', $inquiry->admin_notes);
    }

    public function test_admin_can_export_csv(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        GrazeInquiry::create([
            'full_name' => 'Pam Beesly',
            'phone' => '4165557777',
            'email' => 'pam@art.com',
            'city' => 'Oakville',
            'service' => 'paint-sip',
            'status' => 'quoted',
        ]);

        $response = $this->actingAs($admin)->get('/graze-n-gifts/admin/export');

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'text/csv; charset=UTF-8');
    }

    public function test_admin_can_delete_inquiry(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $inquiry = GrazeInquiry::create([
            'full_name' => 'Spam Bot',
            'phone' => '0000000000',
            'email' => 'spam@bot.com',
            'city' => 'Nowhere',
            'service' => 'multiple',
            'status' => 'cancelled',
        ]);

        $response = $this->actingAs($admin)->delete("/graze-n-gifts/admin/inquiries/{$inquiry->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('graze_inquiries', ['id' => $inquiry->id]);
    }
}
