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

      $user = \P4\User::firstOrCreate(['email' => 'jill@harvard.edu']);
      $user->first_name = 'Jill';
      $user->last_name = 'Hill';
      $user->email = 'jill@harvard.edu';
      $user->password = \Hash::make('helloworld');
      $user->save();

      $user = \P4\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
      $user->first_name = 'Jamal';
      $user->last_name = 'Bacon';
      $user->email = 'jamal@harvard.edu';
      $user->password = \Hash::make('helloworld');
      $user->save();

      $user = \P4\User::firstOrCreate(['email' => 'brandon.lee.darby@gmail.com']);
      $user->first_name = 'Brandon';
      $user->last_name = 'Darby';
      $user->email = 'brandon.lee.darby@gmail.com';
      $user->password = \Hash::make('5mart60Y');
      $user->save();

    }
}
