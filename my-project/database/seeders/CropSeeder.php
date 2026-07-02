<?php

namespace Database\Seeders;

use App\Models\Crop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CropSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $crops = [
            [
                'title' => 'Fresh Tomatoes',
                'content' => 'High-quality fresh tomatoes grown organically. Rich in vitamins and antioxidants. Perfect for salads, cooking, and juice.',
                'categories_id' => 2, // Vegetables
                'image' => 'crops/tomatoes.jpg',
                'status' => true,
                'slug' => 'fresh-tomatoes',
            ],
            [
                'title' => 'Organic Spinach',
                'content' => 'Fresh, crispy spinach leaves harvested at peak freshness. Packed with iron, calcium, and vitamins. Ideal for salads and cooking.',
                'categories_id' => 2, // Vegetables
                'image' => 'crops/spinach.jpg',
                'status' => true,
                'slug' => 'organic-spinach',
            ],
            [
                'title' => 'Golden Carrots',
                'content' => 'Sweet and crunchy carrots with high beta-carotene content. Perfect for raw consumption, juicing, or cooking. Grown without harmful pesticides.',
                'categories_id' => 2, // Vegetables
                'image' => 'crops/carrots.jpg',
                'status' => true,
                'slug' => 'golden-carrots',
            ],
            [
                'title' => 'Fresh Mangoes',
                'content' => 'Sweet and juicy mangoes from premium farms. The king of fruits, loaded with vitamins and minerals. Best enjoyed fresh or in smoothies.',
                'categories_id' => 3, // Fruits
                'image' => 'crops/mangoes.jpg',
                'status' => true,
                'slug' => 'fresh-mangoes',
            ],
            [
                'title' => 'Oranges - Citrus Fresh',
                'content' => 'Delicious and refreshing oranges packed with vitamin C. Perfect for juice, eating fresh, or making preserves. Sourced from quality orchards.',
                'categories_id' => 3, // Fruits
                'image' => 'crops/oranges.jpg',
                'status' => true,
                'slug' => 'oranges-citrus-fresh',
            ],
            [
                'title' => 'Basmati Rice Premium',
                'content' => 'Long-grain basmati rice with excellent aroma and taste. Perfectly cooked grains that remain separate. Ideal for biryani, pilaf, and everyday cooking.',
                'categories_id' => 4, // Grains
                'image' => 'crops/basmati-rice.jpg',
                'status' => true,
                'slug' => 'basmati-rice-premium',
            ],
            [
                'title' => 'Red Kidney Beans',
                'content' => 'Nutritious red kidney beans rich in protein and fiber. Perfect for curries, soups, and salads. An excellent source of plant-based protein.',
                'categories_id' => 4, // Grains
                'image' => 'crops/kidney-beans.jpg',
                'status' => true,
                'slug' => 'red-kidney-beans',
            ],
            [
                'title' => 'Fresh Cow Milk',
                'content' => 'Pure, fresh cow milk delivered daily. Rich in calcium and proteins. Sourced from healthy, well-fed dairy cows. Perfect for drinking and cooking.',
                'categories_id' => 5, // Dairy
                'image' => 'crops/cow-milk.jpg',
                'status' => true,
                'slug' => 'fresh-cow-milk',
            ],
            [
                'title' => 'Homemade Yogurt',
                'content' => 'Creamy and nutritious homemade yogurt made from fresh milk. Rich in probiotics for gut health. No artificial additives or preservatives.',
                'categories_id' => 5, // Dairy
                'image' => 'crops/yogurt.jpg',
                'status' => true,
                'slug' => 'homemade-yogurt',
            ],
            [
                'title' => 'Paneer - Fresh Cheese',
                'content' => 'Soft and delicious paneer made from fresh milk. Perfect for curries, grilling, or making paneer tikka. A staple in Indian cuisine.',
                'categories_id' => 5, // Dairy
                'image' => 'crops/paneer.jpg',
                'status' => true,
                'slug' => 'paneer-fresh-cheese',
            ],
        ];

        foreach ($crops as $crop) {
            Crop::create($crop);
        }
    }
}
