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
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admimail@mail.com';
        $user->password = bcrypt('admin');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'User1';
        $user->email = 'user1@mail.com';
        $user->password = bcrypt('user1');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
