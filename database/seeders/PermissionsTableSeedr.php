<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Permission::create([
                'name'=>'edit_users'
            ]);
            Permission::create([
                'name' => 'trash_users'
            ]);
            Permission::create([
                'name' => 'force_delete_users'
            ]);
            Permission::create([
                'name' => 'view_all_users'
            ]);

            Permission::create([
                'name' => 'restore_users'
            ]);
            Permission::create([
                'name' => 'view_all_trashed_users'
            ]);
            Permission::create([
                'name' => 'view_all_roles'
            ]);
            Permission::create([
                'name' => 'edit_roles'
            ]);
            Permission::create([
                'name' => 'delete_roles'
            ]);
            Permission::create([
                'name' => 'create_roles'
            ]);
            Permission::create([
                'name' => 'view_all_permissions'
            ]);
        Permission::create([
            'name' => 'edit_all_posts'
        ]);
        Permission::create([
            'name' => 'delete_all_posts'
        ]);
        Permission::create([
            'name' => 'edit_all_categories'
        ]);
        Permission::create([
            'name' => 'delete_all_categories'
        ]);
        Permission::create([
            'name'=> 'view_all_course_categories'
        ]);
        Permission::create([
            'name' => 'edit_course_categories'
        ]);
        Permission::create([
            'name' => 'delete_course_categories'
        ]);
        Permission::create([
            'name' => 'create_course_categories'
        ]);

        Permission::create([
            'name' => 'edit_course_subcategories'
        ]);
        Permission::create([
            'name' => 'delete_course_subcategories'
        ]);
        Permission::create([
            'name' => 'create_course_subcategories'
        ]);

        Permission::create([
            'name' => 'edit_courses'
        ]);
        Permission::create([
            'name' => 'delete_courses'
        ]);
        Permission::create([
            'name' => 'create_courses'
        ]);
        Permission::create([
            'name' => 'view_all_sections'
        ]);
        Permission::create([
            'name' => 'edit_sections'
        ]);
        Permission::create([
            'name' => 'delete_sections'
        ]);
        Permission::create([
            'name' => 'delete_videos'
        ]);
        Permission::create([
            'name' => 'edit_videos'
        ]);
        Permission::create([
            'name' => 'view_all_videos'
        ]);
        Permission::create([
            'name' => 'view_all_courses'
        ]);

    }
}
