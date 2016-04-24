<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OwnersTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(EquipmentTableSeeder::class);
    }
}
