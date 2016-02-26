<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->usersPermissions();
    	$this->rolesPermissions();
    }

    public function usersPermissions()
    {
        Permission::create(['name' => 'List users', 'slug' => 'users-list']);
        Permission::create(['name' => 'Show user', 'slug' => 'users-show']);
        Permission::create(['name' => 'Create user', 'slug' => 'users-create']);
        Permission::create(['name' => 'Edit user', 'slug' => 'users-edit']);
        Permission::create(['name' => 'Delete user', 'slug' => 'users-delete']);
    }

    public function rolesPermissions()
    {
        Permission::create(['name' => 'List roles', 'slug' => 'roles-list']);
        Permission::create(['name' => 'Show role', 'slug' => 'roles-show']);
        Permission::create(['name' => 'Create role', 'slug' => 'roles-create']);
        Permission::create(['name' => 'Edit role', 'slug' => 'roles-edit']);
        Permission::create(['name' => 'Delete role', 'slug' => 'roles-delete']);
    }
}
