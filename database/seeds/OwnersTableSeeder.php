<?php

use Illuminate\Database\Seeder;

class OwnersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('owners')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'first_name' => 'Taylor',
          'last_name' => 'Vaas',
        ]);

        DB::table('owners')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'first_name' => 'Rush',
          'last_name' => 'Ramsay',
        ]);

        DB::table('owners')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'first_name' => 'Mathew',
          'last_name' => 'Morgan',
        ]);

        DB::table('owners')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'first_name' => 'Brandon',
          'last_name' => 'Darby',
        ]);

        DB::table('owners')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'first_name' => 'Kyle',
          'last_name' => 'France',
        ]);
    }
}
