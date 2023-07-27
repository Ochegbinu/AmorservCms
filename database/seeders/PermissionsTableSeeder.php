<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Permission::create([
            'name' => 'Admin_create',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'Admin_edit',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'Admin_delete',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'Admin_update',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'Admin_view_admin_panel',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'Editor_create',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'Editor_comment',
            'guard_name' => 'web',
        ]);
    }
}
