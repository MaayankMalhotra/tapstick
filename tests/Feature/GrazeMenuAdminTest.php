<?php

namespace Tests\Feature;

use App\Models\GrazeMenuCategory;
use App\Models\GrazeMenuItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GrazeMenuAdminTest extends TestCase
{
    use RefreshDatabase;

    protected GrazeMenuCategory $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->category = GrazeMenuCategory::create([
            'slug' => 'snacks',
            'name' => 'Snacks & Bites',
            'subtitle' => 'Priced per piece.',
            'sort_order' => 1,
            'is_active' => true,
        ]);
    }

    public function test_unauthenticated_user_redirected_to_graze_login(): void
    {
        $response = $this->get(route('graze.admin.menu.index'));
        $response->assertRedirect(route('graze.admin.login'));
    }

    public function test_admin_can_view_menu_manager(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        GrazeMenuItem::create([
            'category_id' => $this->category->id,
            'name' => 'Truffle Paneer Skewers',
            'description' => 'Marinated paneer with summer truffle glaze',
            'type' => 'Veg',
            'price' => '$4.50',
            'unit' => '/ pc',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('graze.admin.menu.index'));

        $response->assertStatus(200);
        $response->assertSee('Catering Menu Manager');
        $response->assertSee('Truffle Paneer Skewers');
        $response->assertSee('$4.50');
        $response->assertSee('Snacks & Bites');
    }

    public function test_admin_can_add_menu_item(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $payload = [
            'category_id' => $this->category->id,
            'name' => 'Smoked Lamb Sliders',
            'description' => 'Slow-cooked spiced lamb on mini brioche',
            'type' => 'Non-Veg',
            'price' => '$5.00',
            'unit' => '/ pc',
            'sort_order' => 10,
        ];

        $response = $this->actingAs($admin)->post(route('graze.admin.menu.store'), $payload);

        $response->assertRedirect();
        $this->assertDatabaseHas('graze_menu_items', [
            'name' => 'Smoked Lamb Sliders',
            'category_id' => $this->category->id,
            'type' => 'Non-Veg',
            'price' => '$5.00',
            'unit' => '/ pc',
            'is_active' => true,
        ]);
    }

    public function test_admin_can_update_menu_item(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $item = GrazeMenuItem::create([
            'category_id' => $this->category->id,
            'name' => 'Old Dish Name',
            'description' => 'Old description',
            'type' => 'Veg',
            'price' => '$3.00',
            'unit' => '/ pc',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->put(route('graze.admin.menu.update', $item), [
            'category_id' => $this->category->id,
            'name' => 'Artisanal Burrata Crostini',
            'description' => 'Fresh burrata, heirloom tomato, basil reduction',
            'type' => 'Veg',
            'price' => '$4.25',
            'unit' => '/ pc',
            'sort_order' => 1,
            'is_active' => '1',
        ]);

        $response->assertRedirect();

        $item->refresh();
        $this->assertEquals('Artisanal Burrata Crostini', $item->name);
        $this->assertEquals('$4.25', $item->price);
        $this->assertEquals('Fresh burrata, heirloom tomato, basil reduction', $item->description);
    }

    public function test_admin_can_toggle_item_active_status(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $item = GrazeMenuItem::create([
            'category_id' => $this->category->id,
            'name' => 'Seasonal Mango Kulfi',
            'type' => 'Veg',
            'price' => '$3.50',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->patch(route('graze.admin.menu.toggle', $item));
        $response->assertRedirect();

        $item->refresh();
        $this->assertFalse($item->is_active);

        $response2 = $this->actingAs($admin)->patch(route('graze.admin.menu.toggle', $item));
        $response2->assertRedirect();

        $item->refresh();
        $this->assertTrue($item->is_active);
    }

    public function test_admin_can_delete_menu_item(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $item = GrazeMenuItem::create([
            'category_id' => $this->category->id,
            'name' => 'Discontinued Cocktail',
            'type' => 'Veg',
            'price' => '$6.00',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->delete(route('graze.admin.menu.destroy', $item));

        $response->assertRedirect();
        $this->assertDatabaseMissing('graze_menu_items', ['id' => $item->id]);
    }

    public function test_admin_can_update_category_details(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->patch(route('graze.admin.menu.category.update', $this->category), [
            'name' => 'Gourmet Canapés & Bites',
            'subtitle' => 'Hand-crafted luxury finger foods for elite events.',
        ]);

        $response->assertRedirect();

        $this->category->refresh();
        $this->assertEquals('Gourmet Canapés & Bites', $this->category->name);
        $this->assertEquals('Hand-crafted luxury finger foods for elite events.', $this->category->subtitle);
    }

    public function test_public_landing_page_receives_database_menu_items(): void
    {
        GrazeMenuItem::create([
            'category_id' => $this->category->id,
            'name' => 'Live Signature Truffle Chaat',
            'description' => 'Crisp puris with black truffle yogurt and pomegranate',
            'type' => 'Veg',
            'price' => '$5.50',
            'unit' => '/ pc',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->get('/gaze-n-gifts');
        $response->assertStatus(200);
        $response->assertSee('Live Signature Truffle Chaat');
    }
}
