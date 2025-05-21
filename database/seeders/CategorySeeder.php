<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Web Development',
            'Mobile Development',
            'Data Science',
            'Machine Learning',
            'Artificial Intelligence',
            'Cloud Computing',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
