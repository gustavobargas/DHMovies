<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();
    
        $user_permission = Permission::where('slug','create-tasks')->first();
        $admin_permission = Permission::where('slug', 'edit-users')->first();

        $user_role = new Role();
        $user_role->slug = 'user';
        $user_role->name = 'Front-end user';
        $user_role->save();
        $user_role->permissions()->attach($user_permission);

        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Assistant admin';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);
    }
}
