<?php

use Illuminate\Database\Seeder;
use Share\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An author';
        $role_user->save();

        $role_author = new Role();
        $role_author->name = 'author';
        $role_author->description = 'Full access';
        $role_author->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'A admin';
        $role_admin->save();
    }
}
