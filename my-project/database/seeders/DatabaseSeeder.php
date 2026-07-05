<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User (role = 1)
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'mobile' => '9876543210',
            'role' => 1,
            'password' => bcrypt('password123'),
        ]);

        // Create Regular User (role = 2)
        User::factory()->create([
            'name' => 'John Farmer',
            'email' => 'farmer@example.com',
            'mobile' => '9876543211',
            'cat' => 'farmer',
            'role' => 2,
            'password' => bcrypt('password123'),
        ]);

        // Create more regular users
        User::factory(5)->create([
            'role' => 2,
        ]);

        // Run seeders
        $this->call([
            CategorySeeder::class,
            CropSeeder::class,
            SchemeSeeder::class,
            MandiPriceSeeder::class,
        ]);
    }
}
