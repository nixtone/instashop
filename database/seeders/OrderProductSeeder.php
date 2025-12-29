<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderProducts = [
            ['order_id' => 1, 'product_id' => 1, 'price' => 100, 'quantity' => 2],
            ['order_id' => 1, 'product_id' => 2, 'price' => 150, 'quantity' => 1],
        ];
        foreach ($orderProducts as $orderProduct) {
            OrderProduct::create($orderProduct);
        }
    }
}
