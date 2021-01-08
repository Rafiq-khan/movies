<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::create([
            'name' => 'Admin', 
            'slug' => 'admin',
            'permissions' => [
                'admin' => true,
            ]
        ]);
        $user = Role::create([
            'name' => 'User', 
            'slug' => 'user',
            'permissions' => [
                'user' => true,
  
            ]
        ]);
    }
}
