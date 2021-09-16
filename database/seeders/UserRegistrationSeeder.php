<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1=User::create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('12345678')
        ]);
        $user1->assignRole('User');

        $user2=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $user2->assignRole('Admin');
        $user3=User::create([
            'name' => 'super_admin',
            'email' => 'super_admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $user3->assignRole(['Super Admin','User']);

    }
}
