<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=Role::create(['name' => 'Super Admin']);
        // dd(Permission::all()->pluck('id')->toArray());
        $role->permissions()->attach(Permission::all()->pluck('id')->toArray());
        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'User']);
        Role::create(['name' => 'Admin']);
    }
}
