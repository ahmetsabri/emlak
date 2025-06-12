<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds to populate categories and subcategories in English and Arabic.
     *
     * @return void
     */
    public function run(): void
    {
        // Define categories with English and Arabic names, including subcategories
        $categories = [
            [
                'main_category' => [
                    'en' => 'Residential',
                'ar' => 'سكني',
                ],
                'subcategories' => [
                    ['en' => 'For Rent', 'ar' => 'للإيجار'],
                    ['en' => 'For Sale', 'ar' => 'للبيع'],
                ],
            ],
            [
                'main_category' => [
                    'en' => 'Commercial',
                    'ar' => 'تجاري',
                ],
                'subcategories' => [
                    ['en' => 'For Rent', 'ar' => 'للإيجار'],
                    ['en' => 'For Sale', 'ar' => 'للبيع'],
                ],
            ],
            [
                'main_category' => [
                    'en' => 'Land',
                    'ar' => 'أرض',
                ],
                'subcategories' => [
                    ['en' => 'For Rent', 'ar' => 'للإيجار'],
                    ['en' => 'For Sale', 'ar' => 'للبيع'],
                ],
            ],
            [
                'main_category' => [
                    'en' => 'Residential Projects',
                    'ar' => 'مشاريع سكنية',
                ],
                'subcategories' => [
                    ['en' => 'For Rent', 'ar' => 'للإيجار'],
                    ['en' => 'For Sale', 'ar' => 'للبيع'],
                ],
            ],
            [
                'main_category' => [
                    'en' => 'Building',
                    'ar' => 'مبنى',
                ],
                'subcategories' => [
                    ['en' => 'For Rent', 'ar' => 'للإيجار'],
                    ['en' => 'For Sale', 'ar' => 'للبيع'],
                ],
            ],
            [
                'main_category' => [
                    'en' => 'Timeshare',
                    'ar' => 'ملكية مشتركة',
                ],
                'subcategories' => [
                    ['en' => 'For Rent', 'ar' => 'للإيجار'],
                    ['en' => 'For Sale', 'ar' => 'للبيع'],
                ],
            ],
            [
                'main_category' => [
                    'en' => 'Touristic Facility',
                    'ar' => 'منشأة سياحية',
                ],
                'subcategories' => [
                    ['en' => 'For Rent', 'ar' => 'للإيجار'],
                    ['en' => 'For Sale', 'ar' => 'للبيع'],
                ],
            ],
        ];

        // Iterate through categories to create parent and child records
        foreach ($categories as $categoryData) {
            // Create parent category with both English and Arabic names
            $category = Category::create(['name' => $categoryData['main_category']]);

            // Create subcategories with both English and Arabic names
            foreach ($categoryData['subcategories'] as $subCategory) {
                $category->children()->create(['name' => $subCategory]);
            }
        }
    }
}
