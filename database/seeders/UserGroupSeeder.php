<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userGroups = [
            ['name' => 'Управление'],
            ['name' => 'Покупатели'],
        ];
        foreach ($userGroups as $userGroup) {
            UserGroup::create($userGroup);
        }
    }
}
