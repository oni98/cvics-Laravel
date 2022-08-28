<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleAdmin= Role::create(['name' => 'admin']);
        $roleAgent= Role::create(['name' => 'agent']);
        $roleUser= Role::create(['name' => 'user']);

        // Permission List as array
        $permissions = [
            
            // agent permission
            'agent.create',
            'agent.view',
            'agent.edit',
            'agent.delete',
            'agent.approve',

            // profile permission
            'profile.create',
            'profile.view',
        ];

        // Create and Assign Permission
        for ($i=0; $i < count($permissions) ; $i++) { 
            // create permission
            $permission = Permission::create(['name' => $permissions[$i]]);
            $roleAdmin->givePermissionTo($permission);
            $permission->assignRole($roleAdmin);
        }
    }
}
