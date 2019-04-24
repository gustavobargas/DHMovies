<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role = Role::where('name', 'user')->first();
        $admin_role = Role::where('name', 'admin')->first();
        $user_perm = Permission::where('slug','create-tasks')->first();
        $admin_perm = Permission::where('slug','edit-users')->first();

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($user_role);
        $user->roles()->attach($user_role);
        $user->permissions()->attach($admin_perm);

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($admin_role);
        $admin->permissions()->attach($admin_perm);
    }
}
