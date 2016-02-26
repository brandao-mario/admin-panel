<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role = Role::create(['name' => 'Admin']);

    	foreach (Permission::all() as $permission) {
    		$role->permissions()->save($permission);
    	}
        
        Role::create(['name' => 'User']);
    }
}
