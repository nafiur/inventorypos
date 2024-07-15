<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\SupplierSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Nafiur Rahman',
            'email' => 'nafiur@outlook.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        $this->call(SupplierSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}