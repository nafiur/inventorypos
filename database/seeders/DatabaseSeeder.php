<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\SupplierSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\ProductCategorySeeder;

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

        Unit::factory()->create([
            'name' => 'KG',
            'status' => '1',
        ]);
        Unit::factory()->create([
            'name' => 'Litre',
            'status' => '1',
        ]);
        Unit::factory()->create([
            'name' => 'Piece',
            'status' => '1',
        ]);

        $this->call(SupplierSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}