<?php

use Illuminate\Database\Seeder;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner_id = \P4\Owner::where('last_name', '=', 'Darby')->pluck('id')->first();
        DB::table('equipment')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'item' => 'Flagpole',
            'borrowed' => '0',
            'owner_id' => $owner_id,
        ]);
        $owner_id = \P4\Owner::where('last_name','=','Vass')->pluck('id')->first();
        DB::table('equipment')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'item' => 'Troop Scrapbook',
            'borrowed' => '0',
            'owner_id' => $owner_id,
        ]);
        $owner_id = \P4\Owner::where('last_name','=','Morgan')->pluck('id')->first();
        DB::table('equipment')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'item' => 'American Flag',
            'borrowed' => '0',
            'owner_id' => $owner_id,
        ]);
        $owner_id = \P4\Owner::where('last_name','=','France')->pluck('id')->first();
        DB::table('equipment')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'item' => 'Ropes',
            'borrowed' => '0',
            'owner_id' => $owner_id,
        ]);
        $owner_id = \P4\Owner::where('last_name','=','Ramsay')->pluck('id')->first();
        DB::table('equipment')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'item' => 'PVC Pipes',
            'borrowed' => '0',
            'owner_id' => $owner_id,
        ]);
        $owner_id = \P4\Owner::where('last_name', '=', 'Darby')->pluck('id')->first();
        DB::table('equipment')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'item' => 'Wooden Staffs',
            'borrowed' => '0',
            'owner_id' => $owner_id,
        ]);
        $owner_id = \P4\Owner::where('last_name','=','Ramsay')->pluck('id')->first();
        DB::table('equipment')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'item' => 'Lashing Handbook',
            'borrowed' => '0',
            'owner_id' => $owner_id,
        ]);
    }
}
