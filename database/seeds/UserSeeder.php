<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'name' => 'kevin chicas',
            'email'=> 'kevin@gmail.com',
            'password' => bcrypt('adminadmin')
        ])->assignRole('Admin');

        User::create([
            'name' => 'fran orellana',
            'email'=> 'fran@gmail.com',
            'password' => bcrypt('adminadmin')
        ])->assignRole('Recepcionista');

        User::create([
            'name' => 'denisse mejia',
            'email'=> 'denisse@gmail.com',
            'password' => bcrypt('adminadmin')
        ])->assignRole('Laboratorista');

        factory(App\User::class, 25)->create();
    }
}
