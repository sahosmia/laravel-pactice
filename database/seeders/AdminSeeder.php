<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Admin One',
                'email' => 'admin@example.com',
                'password' => bcrypt('password123'),
            ],
        ];

        foreach ($admins as $admin) {
            \App\Models\Admin::create($admin);
        }
    }
}
