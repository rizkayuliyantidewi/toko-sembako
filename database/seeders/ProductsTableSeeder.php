<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ProductCategory::where('name', 'Sembako')->first();
        $products = [];

        $products[] = [
            'product_category_id' => $category->id,
            'name' => 'PAKET SEMBAKO HEMAT A',
            'description' => '- Beras Premium 5kg
            - Minyak tropical 1L
            - Gula 1kg
            - Telur 10 butir
            - Indomie goreng 2pcs
            - Indomie soto mie 2pcs
            - Kopi kapal api 10 sachet
            - Kecap Bango 1pcs',
            'buy_price' => 115000,
            'sell_price' => 130000,
            'product_image' => asset('images/products/photo1627489001.jpeg'),
        ];

        $products[] = [
            'product_category_id' => $category->id,
            'name' => 'PAKET SEMBAKO HEMAT B',
            'description' => '- Beras Premium 5kg
            - Minyak tropical 1L
            - Gula 1kg
            - Telur 10 butir',
            'buy_price' => 95000,
            'sell_price' => 110000,
            'product_image' => asset('images/products/photo1627489277.jpeg'),
        ];

        $products[] = [
            'product_category_id' => $category->id,
            'name' => 'PAKET SEMBAKO HEMAT C',
            'description' => '- Beras Premium 5kg
            - Minyak tropical 1L
            - Gula 1kg',
            'buy_price' => 65000,
            'sell_price' => 75000,
            'product_image' => asset('images/products/photo1627489419.jpeg'),
        ];
        
        $products[] = [
            'product_category_id' => $category->id,
            'name' => 'PAKET MINYAK & BERAS',
            'description' => '- Beras Premium 5kg
            - Minyak tropical 1L',
            'buy_price' => 45000,
            'sell_price' => 55000,
            'product_image' => asset('images/products/photo1627489581.jpeg'),
        ];

        $products[] = [
            'product_category_id' => $category->id,
            'name' => 'PAKET BERAS PREMIUM ROJOLELE',
            'description' => '- Beras Premium 5kg
            - Beras Pulen',
            'buy_price' => 40000,
            'sell_price' => 50000,
            'product_image' => asset('images/products/photo1627489726.jpeg'),
        ];

        foreach($products as $product) {
            $product['description'] = nl2br($product['description']);
            Product::create($product);
        }
    }
}
