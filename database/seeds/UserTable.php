<?php

use Illuminate\Database\Seeder;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array('name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'admin',
                'avatar' =>'default.jpg'
            ),
            array('name' => 'Client',
                'email' => 'client@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'client',
                'avatar' =>'default.jpg'
            ),
            array('name' => 'Delivery man',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'user',
                'avatar' =>'default.jpg'
            ),
        ));
    }
}
