<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'test name 1',
                'login' => 'test1',
                'user_group_id' => 1,
                'phone' => '+7 (111) 111-11-11)',
                'address' => 'Екатеринбург, ул.Ленина 55',
                'password' => 'test1'
            ],
            [
                'name' => 'test name 2',
                'login' => 'test2',
                'user_group_id' => 2,
                'phone' => '+7 (222) 222-22-22)',
                'address' => 'Екатеринбург, ул.Ленина 55',
                'password' => 'test2'
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
