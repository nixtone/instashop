<?php

namespace Database\Seeders;

use App\Models\OptionCategory;
use Illuminate\Database\Seeder;

class OptionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $optionCategories = [
            ['option_id' => 1, 'category_id' => 1],
            ['option_id' => 2, 'category_id' => 1],
            ['option_id' => 3, 'category_id' => 1],
        ];
        foreach ($optionCategories as $optionCategory) {
            OptionCategory::create($optionCategory);
        }
    }
}
