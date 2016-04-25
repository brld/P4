<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner_id = \P4\Owner::where('last_name','=','Darby')->pluck('id')->first();
        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Pinnacles Information',
            'owner_id' => $owner_id,
        ]);

        $owner_id = \P4\Owner::where('last_name','=','Vass')->pluck('id')->first();
        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Santa Teresa Information',
            'owner_id' => $owner_id,
        ]);

        $owner_id = \P4\Owner::where('last_name','=','Morgan')->pluck('id')->first();
        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'California State Parks Map',
            'owner_id' => $owner_id,
        ]);

        $owner_id = \P4\Owner::where('last_name','=','France')->pluck('id')->first();
        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Yosemite Information',
            'owner_id' => $owner_id,
        ]);

        $owner_id = \P4\Owner::where('last_name','=','Ramsay')->pluck('id')->first();
        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'South Skyline Region',
            'owner_id' => $owner_id,
        ]);
    }
}
