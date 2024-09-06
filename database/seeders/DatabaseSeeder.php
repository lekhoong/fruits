<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Product::create([
            'product_id' => 'TOM001', // 为每个产品设置一个唯一的 product_id
            'name' => 'Tomato',
            'price' => '10.00',
            'image' => 'images/tomato-icon.png',
        ]);

        Product::create([
            'product_id' => 'CAR001',
            'name' => 'Carrot',
            'price' => '5.00',
            'image' => 'images/carrot.png',
        ]);

        Product::create([
            'product_id' => 'PIN001',
            'name' => 'Pineapple',
            'price' => '15.00',
            'image' => 'images/pineapple.png',
      
        ]);
    }
}
