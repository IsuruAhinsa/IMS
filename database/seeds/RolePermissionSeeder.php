<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create roles
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $normalUser = Role::create(['name' => 'Normal User']);
        $editor = Role::create(['name' => 'Editor']);

        // permissions list as array
        $permissions = [

            [
                'group_name' => 'Settings',
                'permissions' => [
                    'settings.create',
                    'settings.view',
                    'settings.edit',
                    'settings.delete',
                ],
            ],

            [
                'group_name' => 'Users',
                'permissions' => [
                    'users.create',
                    'users.view',
                    'users.edit',
                    'users.delete',
                ],
            ],

            [
                'group_name' => 'Roles',
                'permissions' => [
                    'roles.create',
                    'roles.view',
                    'roles.edit',
                    'roles.delete',
                ],
            ],

        ];

        // assign permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                ]);
                $superAdmin->givePermissionTo($permission);
                $permission->assignRole($superAdmin);
            }
        }
    }
}
