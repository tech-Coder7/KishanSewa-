<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create top-level categories
        $vegetables = Category::create([
            'name' => 'Vegetables',
            'slug' => 'vegetables',
            'parent_id' => null,
            'status' => true,
            'sort_order' => 1,
        ]);

        $fruits = Category::create([
            'name' => 'Fruits',
            'slug' => 'fruits',
            'parent_id' => null,
            'status' => true,
            'sort_order' => 2,
        ]);

        $grains = Category::create([
            'name' => 'Grains',
            'slug' => 'grains',
            'parent_id' => null,
            'status' => true,
            'sort_order' => 3,
        ]);

        $dairy = Category::create([
            'name' => 'Dairy Products',
            'slug' => 'dairy-products',
            'parent_id' => null,
            'status' => true,
            'sort_order' => 4,
        ]);

        // Create subcategories for vegetables
        Category::create([
            'name' => 'Leafy Vegetables',
            'slug' => 'leafy-vegetables',
            'parent_id' => $vegetables->id,
            'status' => true,
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Root Vegetables',
            'slug' => 'root-vegetables',
            'parent_id' => $vegetables->id,
            'status' => true,
            'sort_order' => 2,
        ]);

        // Create subcategories for fruits
        Category::create([
            'name' => 'Citrus Fruits',
            'slug' => 'citrus-fruits',
            'parent_id' => $fruits->id,
            'status' => true,
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Tropical Fruits',
            'slug' => 'tropical-fruits',
            'parent_id' => $fruits->id,
            'status' => true,
            'sort_order' => 2,
        ]);

        // Create subcategories for grains
        Category::create([
            'name' => 'Cereals',
            'slug' => 'cereals',
            'parent_id' => $grains->id,
            'status' => true,
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Pulses',
            'slug' => 'pulses',
            'parent_id' => $grains->id,
            'status' => true,
            'sort_order' => 2,
        ]);

        // Create subcategories for dairy
        Category::create([
            'name' => 'Milk Products',
            'slug' => 'milk-products',
            'parent_id' => $dairy->id,
            'status' => true,
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Cheese & Yogurt',
            'slug' => 'cheese-yogurt',
            'parent_id' => $dairy->id,
            'status' => true,
            'sort_order' => 2,
        ]);
    }
}
