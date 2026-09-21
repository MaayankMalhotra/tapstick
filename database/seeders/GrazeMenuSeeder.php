<?php

namespace Database\Seeders;

use App\Models\GrazeMenuCategory;
use App\Models\GrazeMenuItem;
use Illuminate\Database\Seeder;

class GrazeMenuSeeder extends Seeder
{
    public function run(): void
    {
        $menuData = [
            [
                'slug' => 'snacks',
                'name' => 'Snacks & Bites',
                'subtitle' => 'Priced per piece unless noted. Mix veg & non-veg freely. Minimum 10 pieces per item.',
                'sort_order' => 1,
                'items' => [
                    ['name' => 'Caprese Skewers', 'desc' => 'Tomato, bocconcini, basil, balsamic glaze', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Veg Samosas', 'desc' => 'Crisp pastry, spiced potato & peas', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Spring Rolls', 'desc' => 'Crunchy veg rolls, sweet-chili dip', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Cream Cheese Cucumber Sandwiches', 'desc' => 'Soft tea sandwiches, fresh dill', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Bruschetta', 'desc' => 'Toasted baguette, tomato-basil', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Cheese Corn Tart', 'desc' => 'Cheesy sweet-corn in a crisp tart', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Aloo Tikki Bites', 'desc' => 'Mini crispy potato patties, chutney drizzle', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Hara Bhara Kebab', 'desc' => 'Spinach & green-pea cutlets', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Corn & Cheese Balls', 'desc' => 'Golden-fried, gooey centre', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Mac & Cheese Bites', 'desc' => 'Crumbed & fried, creamy centre', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Mini Grilled Cheese', 'desc' => 'Buttery, golden triangles', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Falafel', 'desc' => 'Served with tzatziki', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Stuffed Mushrooms', 'desc' => 'Herbed cheese filling', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Chilli Idli Cube Skewers', 'desc' => 'Crispy idli cubes, Indo-Chinese glaze', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Veg Manchurian (Dry)', 'desc' => 'Indo-Chinese, tangy glaze', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pp'],
                    ['name' => 'Honey Chilli Potatoes', 'desc' => 'Crispy, sweet-spicy toss', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pp'],
                    ['name' => 'Chilli Paneer', 'desc' => 'Indo-Chinese, sweet-spicy sauce', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pp'],
                    ['name' => 'Tandoori Soya Chaap', 'desc' => 'Marinated & char-grilled, smoky glaze', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pp'],
                    ['name' => 'Matar Kulcha', 'desc' => 'Spiced chickpeas, soft kulcha', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Pav Bhaji', 'desc' => 'Buttery mashed veg curry, mini pav', 'type' => 'Veg', 'price' => '$3.50', 'unit' => null],
                    ['name' => 'Vada Pav', 'desc' => 'Mumbai-style potato slider', 'type' => 'Veg', 'price' => '$3.50', 'unit' => '/ pp'],
                    ['name' => 'Veg / Chicken Momos', 'desc' => 'Steamed or tandoori, house chutney', 'type' => 'Veg / Non-Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Paneer / Chicken Sliders', 'desc' => 'Mini brioche, spiced patty, slaw', 'type' => 'Veg / Non-Veg', 'price' => '$3.50', 'unit' => null],
                    ['name' => 'Chicken Tikka Skewers', 'desc' => 'Char-grilled, tandoori spice', 'type' => 'Non-Veg', 'price' => '$3.50', 'unit' => '/ pp'],
                    ['name' => 'Chicken Malai Tikka', 'desc' => 'Creamy, mildly spiced', 'type' => 'Non-Veg', 'price' => '$4.00', 'unit' => '/ pp'],
                ]
            ],
            [
                'slug' => 'chaat',
                'name' => 'Chaat, Platters & Cones',
                'subtitle' => 'Crowd favourites for grazing counters & grab-and-go. Platters serve 4–6.',
                'sort_order' => 2,
                'items' => [
                    ['name' => 'Chaat Platter', 'desc' => 'Papdi, samosa, chutneys, sev, yogurt — sharing size', 'type' => 'Veg', 'price' => '$50.00', 'unit' => null],
                    ['name' => 'Loaded Chaat Platter', 'desc' => 'Papdi, samosa, chutneys, sev, yogurt', 'type' => 'Veg', 'price' => '$28.00', 'unit' => '/ platter'],
                    ['name' => 'Papdi Chaat', 'desc' => 'Crispy papdi, yogurt, chutneys, sev', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pp'],
                    ['name' => 'Katori Chaat', 'desc' => 'Edible basket, spiced filling, yogurt & chutney', 'type' => 'Veg', 'price' => '$3.50', 'unit' => '/ pc'],
                    ['name' => 'Pani Puri Shots', 'desc' => 'Pre-filled puris with spiced water shots', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ cup'],
                    ['name' => 'Dahi Puri', 'desc' => 'Crispy puris, yogurt, chutneys, sev', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ cup'],
                    ['name' => 'Aloo Tikki Chaat', 'desc' => 'Tikki, chutneys, yogurt, sev', 'type' => 'Veg', 'price' => '$3.50', 'unit' => '/ pc'],
                    ['name' => 'Samosa Chaat', 'desc' => 'Crushed samosa, chole, chutneys', 'type' => 'Veg', 'price' => '$3.50', 'unit' => '/ pp'],
                    ['name' => 'Ragda Pattice', 'desc' => 'Potato patties, white-pea curry', 'type' => 'Veg', 'price' => '$3.50', 'unit' => '/ pp'],
                    ['name' => 'Sev Puri', 'desc' => 'Papdi, potato, chutneys, sev', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ cup'],
                    ['name' => 'Bhel Puri', 'desc' => 'Puffed rice, tangy chutneys, onion & sev', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ cup'],
                    ['name' => 'Fries Cones', 'desc' => 'Masala fries, chutney drizzle, sev', 'type' => 'Veg', 'price' => '$4.00', 'unit' => '/ cone'],
                ]
            ],
            [
                'slug' => 'wraps',
                'name' => 'Wraps, Rolls & Sliders',
                'subtitle' => 'Fresh wraps and rolls with spiced fillings and chutneys.',
                'sort_order' => 3,
                'items' => [
                    ['name' => 'Paneer Tikka Wrap', 'desc' => 'Grilled paneer tikka, mint chutney — bite-sized', 'type' => 'Veg', 'price' => '$3.50', 'unit' => '/ pp'],
                    ['name' => 'Chicken Tikka Wrap', 'desc' => 'Tandoori chicken, onions, chutney — bite-sized', 'type' => 'Non-Veg', 'price' => '$3.50', 'unit' => '/ pp'],
                    ['name' => 'Paneer Kathi Roll', 'desc' => 'Spiced paneer, onions, mint chutney', 'type' => 'Veg', 'price' => '$3.50', 'unit' => '/ pc'],
                    ['name' => 'Veg Frankie', 'desc' => 'Mumbai-style veg roll', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Hummus & Falafel Wrap', 'desc' => 'Fresh veg, tahini-free', 'type' => 'Veg', 'price' => '$3.50', 'unit' => '/ pc'],
                    ['name' => 'Chilli Paneer Slider', 'desc' => 'Indo-Chinese paneer, mini bun', 'type' => 'Veg', 'price' => '$3.50', 'unit' => '/ pc'],
                    ['name' => 'Mumbai Grilled Sandwich', 'desc' => 'Veg, chutney, cheese, masala', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                ]
            ],
            [
                'slug' => 'pasta',
                'name' => 'Pasta & Fusion Mains',
                'subtitle' => 'Wok noodles, pastas, and savory fusion mains.',
                'sort_order' => 4,
                'items' => [
                    ['name' => 'Veg Noodles', 'desc' => 'Wok-tossed hakka noodles', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ plate'],
                    ['name' => 'Schezwan Noodles', 'desc' => 'Spicy Indo-Chinese', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ plate'],
                    ['name' => 'Veg Fried Rice', 'desc' => 'Wok-tossed, mixed veg', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ plate'],
                    ['name' => 'White Sauce Pasta', 'desc' => 'Creamy alfredo-style, herbed', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ plate'],
                    ['name' => 'Pink Sauce Pasta', 'desc' => 'Creamy tomato-rosé, herbed', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ plate'],
                    ['name' => 'Pesto Pasta', 'desc' => 'Basil pesto, parmesan', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ plate'],
                    ['name' => 'Baked Penne', 'desc' => 'Cheesy, oven-baked', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ plate'],
                    ['name' => 'Paneer Makhani + Mini Naan', 'desc' => 'Rich butter gravy, soft naan', 'type' => 'Veg', 'price' => '$4.00', 'unit' => '/ pp'],
                ]
            ],
            [
                'slug' => 'desserts',
                'name' => 'Desserts',
                'subtitle' => 'Handcrafted Indian mithai, miniature desserts, and dessert extensions.',
                'sort_order' => 5,
                'items' => [
                    ['name' => 'Gulab Jamun', 'desc' => 'Warm, syrup-soaked classic', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Rasmalai', 'desc' => 'Saffron cream, chilled', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Rabdi Jalebi Cups', 'desc' => 'Warm jalebi layered with rabdi', 'type' => 'Veg', 'price' => '$3.00', 'unit' => 'ea'],
                    ['name' => 'Kulfi / Kulfi Falooda', 'desc' => 'Traditional frozen dessert', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Motichoor Laddoo', 'desc' => 'Classic festive sweet', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Gajar Halwa', 'desc' => 'Warm carrot pudding (seasonal)', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pp'],
                    ['name' => 'Mini Donuts', 'desc' => 'Glazed & assorted toppings', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Cupcakes', 'desc' => 'Buttercream, custom colours', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Brownie Bites', 'desc' => 'Fudgy, bite-sized', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Chocolate-Dipped Strawberries', 'desc' => 'Hand-dipped, elegant', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Fruit Tartlets', 'desc' => 'Custard & fresh fruit', 'type' => 'Veg', 'price' => '$3.00', 'unit' => '/ pc'],
                    ['name' => 'Mini Cheesecake Cups', 'desc' => 'Individually styled', 'type' => 'Veg', 'price' => '$3.00', 'unit' => 'ea'],
                    ['name' => 'Mini Dessert Cups', 'desc' => 'Layered, individually styled', 'type' => 'Veg', 'price' => '$3.00', 'unit' => 'ea'],
                    ['name' => 'Dessert Grazing Extension', 'desc' => 'Assorted sweets display', 'type' => 'Veg', 'price' => 'from $90', 'unit' => null],
                ]
            ],
            [
                'slug' => 'drinks',
                'name' => 'Drinks',
                'subtitle' => 'Served warm, urn available for chai & coffee. Chilled refreshments prepared fresh.',
                'sort_order' => 6,
                'items' => [
                    ['name' => 'Masala Chai / Coffee', 'desc' => 'Served warm, urn available', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Filter Coffee', 'desc' => 'South-Indian style', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Mango Lassi', 'desc' => 'Thick, sweet, chilled', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Rose Falooda Milk', 'desc' => 'Rose, vermicelli, basil seeds', 'type' => 'Veg', 'price' => '$4.00', 'unit' => null],
                    ['name' => 'Thandai', 'desc' => 'Spiced festive milk', 'type' => 'Veg', 'price' => '$3.50', 'unit' => null],
                    ['name' => 'Nimbu Pani / Shikanji', 'desc' => 'Fresh spiced lemonade', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Virgin Mojito', 'desc' => 'Mint, lime, soda', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Buttermilk (Chaas)', 'desc' => 'Spiced, chilled', 'type' => 'Veg', 'price' => '$3.00', 'unit' => null],
                    ['name' => 'Kanji / Kombucha', 'desc' => 'Fermented, probiotic', 'type' => 'Veg', 'price' => '$3.50', 'unit' => null],
                ]
            ],
        ];

        foreach ($menuData as $catData) {
            $category = GrazeMenuCategory::updateOrCreate(
                ['slug' => $catData['slug']],
                [
                    'name' => $catData['name'],
                    'subtitle' => $catData['subtitle'],
                    'sort_order' => $catData['sort_order'],
                    'is_active' => true,
                ]
            );

            foreach ($catData['items'] as $idx => $itemData) {
                GrazeMenuItem::updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'name' => $itemData['name'],
                    ],
                    [
                        'description' => $itemData['desc'],
                        'type' => $itemData['type'],
                        'price' => $itemData['price'],
                        'unit' => $itemData['unit'],
                        'sort_order' => $idx + 1,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
