<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Konut' => ['Kiralık', 'Satılık'],
            'İş Yeri' => ['Kiralık', 'Satılık'],
            'Arsa' => ['Kiralık', 'Satılık'],
            'Konut Projeleri yeni' => ['Kiralık', 'Satılık'],
            'Bina' => ['Kiralık', 'Satılık'],
            'Devre Mülk' => ['Kiralık', 'Satılık'],
            'Turistik Tesis' => ['Kiralık', 'Satılık'],
        ];

        foreach ($categories as $category => $sub) {
            $category = Category::create(['name' => $category]);

            foreach ($sub as $subCategory) {
                $category->children()->create(['name' => $subCategory]);
            }
        }
    }
}
