<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Casio'],
            ['name' => 'Orient'],
            ['name' => 'Citizen', 'deleted_at' => '2025-10-23 21:21:38'],
            ['name' => 'Garmin'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
