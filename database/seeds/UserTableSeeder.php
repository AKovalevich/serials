<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        \App\Api\V1\Models\User::create(array(
            'name'     => 'Esteban',
            'last_name' => 'Garcia',
            'company_name' => 'Shema App',
            'email'    => 'logs@shemapp.com',
            'password' => \Illuminate\Support\Facades\Hash::make('logspassword'),
        ));
    }
}
