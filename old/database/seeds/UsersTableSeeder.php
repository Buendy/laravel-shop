<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\User::class,1)->create([
            'name' => 'Daniel',
            'email' => 'danielbuendiasmr@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        factory(\App\User::class, 10)->create([
            'password' => bcrypt('12345678php')
        ]);
    }
}
