<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use Illuminate\Database\Seeder;

class CourseCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseSubCategory::factory(10)->create([
            'category_id'=>CourseCategory::factory()->create()->id
        ]);
        CourseSubCategory::factory(10)->create([
            'category_id' => CourseCategory::factory()->create()->id
        ]);
        CourseSubCategory::factory(10)->create([
            'category_id' => CourseCategory::factory()->create()->id
        ]);

    }
}
