<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::updateOrCreate(
            ['id'=>1],
            ['id'=>1,
            'name' => 'Admin',
            'email'=> 'admin@admin.com',
            'password'=> '123456'
        ]);
    }
}
