<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'product_id' => 1,
                'text' => "Хорошая погода",
                'rating' => 5,
                'active' => true,
            ],
            [
                'product_id' => 1,
                'text' => "Отличные котлы",
                'rating' => 3,
                'active' => true,
            ],
            [
                'product_id' => 2,
                'text' => "Серверное сияние",
                'rating' => 5,
                'active' => true,
            ]
        ];
        foreach($reviews as $review) {
            Review::create($review);
        }
    }
}
