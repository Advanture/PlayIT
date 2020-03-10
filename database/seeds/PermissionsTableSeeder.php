<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Permissions for special roles.
     *
     * @var array
     */
    private $permissionsList = [];

    /**
     * Permissions for all roles.
     *
     * @var array
     */
    private $fullPermissions = ['admin.access'];

    /**
     * All roles list.
     *
     * @var array
     */
    private $rolesList = [];

    /**
     * PermissionsTableSeeder constructor.
     */
    public function __construct()
    {
        $this->fillPermissions();
        $this->fillRoles();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermissions();
        $this->createRoles();
    }

    /**
     * Fill permissions in global permission variable.
     * Add new permissions here.
     *
     * @return void
     */
    private function fillPermissions()
    {
        $smmPermissions = [
            'smm.access', 'news.add', 'news.edit', 'news.delete'
        ];

        $moderatorPermissions = [
            'moder.access', 'score.add', 'promocode.add', 'users.ban'
        ];

        $adminPermissions = [
            'manager.access', 'users.roles'
        ];

        $this->permissionsList = [
            'smm' => $smmPermissions,
            'moderator' => $moderatorPermissions,
            'admin' => $adminPermissions,

            'full_permissions' => $this->fullPermissions
        ];
    }

    /**
     * Create all permissions from global permission variable.
     *
     * @return void
     */
    private function createPermissions()
    {
        foreach ($this->permissionsList as $key => $permissions) {
            foreach ($permissions as $value) {
                Permission::create(['name' => $value]);
            }
        }
    }

    /**
     * Fill roles in global roles variable.
     * Add new roles here.
     *
     * @return void
     */
    private function fillRoles()
    {
        $smmRole = [
            'name' => 'smm',
            'permissions' => $this->permissionsList['smm']
        ];
        $moderatorRole = [
            'name' => 'moderator',
            'permissions' => array_merge($this->permissionsList['smm'], $this->permissionsList['moderator'])
        ];
        $adminRole = [
            'name' => 'admin',
            'permissions' => array_merge(
                $this->permissionsList['smm'],
                $this->permissionsList['moderator'],
                $this->permissionsList['admin']
            )
        ];

        $this->rolesList = [$smmRole, $moderatorRole, $adminRole];
    }

    /**
     * Create roles from global roles.
     *
     * @return void
     */
    private function createRoles()
    {
        foreach ($this->rolesList as $role) {
            Role::create(['name' => $role['name']])
                ->givePermissionTo(array_merge($role['permissions'], $this->fullPermissions)
            );
        }
    }
}
