<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Casio G-SHOCK GM-5600YM-8',
                'description' => 'G-Shock. Мужские часы. Противоударный корпус защищает механизм от ударов и вибрации. Циферблат подсвечивается светодиодом. Послесвечение. Цвет подсветки: белый.',
                'price' => 24420,
                'category_id' => 1,
                'external_link' => 'https://www.alltime.ru/watch/casio/GM-5600YM-8/712127/',
            ],
            [
                'name' => 'G-SHOCK GA-2100-1AER',
                'description' => 'Ударопрочные часы с функциональной начинкой прекрасно подойдут для любителей активного образа жизни. Новая серия часов со структурой Carbon Core Guard. Противоударный пластиковый корпус с карбоновыми волокнами более прочный и, в то же время, более легкий. Этот же материал защищает внутренний модуль от повреждений и деформаций при ударах. Электролюминесцентная подсветка освещает весь циферблат. Серые метки и стрелки.',
                'price' => 9640,
                'category_id' => 1,
                'external_link' => 'https://www.alltime.ru/watch/casio/GA-2100-1AER/443802/',
            ],
            [
                'name' => 'G-SHOCK GST-B500D-1AER',
                'description' => '',
                'price' => 33380,
                'category_id' => 1,
                'external_link' => 'https://www.alltime.ru/watch/casio/GST-B500D-1AER/597355/',
            ],
            [
                'name' => 'Casio G-SHOCK GA-2100HDS-7A',
                'description' => '',
                'price' => 13760,
                'category_id' => 1,
                'external_link' => 'https://www.alltime.ru/watch/casio/GA-2100HDS-7A/720085/',
            ],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
