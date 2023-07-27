<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $adminRole = Role::create(['name' => 'Admin']);
       $editorRole = Role::create(['name' => 'Editor']);

       $adminUser = User::create([
           'name' => 'Admin User',
           'email' => 'admin@example.com',
           'password' => bcrypt('password'), 
       ]);

       $adminUser->assignRole($adminRole);
    }
}
