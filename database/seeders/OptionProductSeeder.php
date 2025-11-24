<?php

namespace Database\Seeders;

use App\Models\OptionProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $optionProducts = [
            [
                'option_id' => 1,
                'product_id' => 1,
                'value' => 'кварцевый'
            ]
        ];
        foreach ($optionProducts as $optionProduct) {
            OptionProduct::create($optionProduct);
        }
    }
}
