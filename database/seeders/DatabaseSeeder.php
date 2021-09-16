<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionsTableSeedr::class,
            RoleSeedr::class,
            UserRegistrationSeeder::class,
            CourseCategoriesSeeder::class

        ]);

        foreach(User::all() as $user){
            $category=\App\Models\Category::factory()->create();
            \App\Models\Post::factory(10)->create([
                'user_id'=>$user->id,
                'category_id'=> $category->id
            ]);
        }
    }
}
