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
        //
        DB::table('users')->delete();

        User::create([
            'name'=>'superadmin',
            'username'=>'superadmin',
            'email' => 'superadmin@gmail.com',
            'typeId'=>1,
            'password' => Hash::make('password'),
        ]);
    }
}
