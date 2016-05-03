<?php

use Illuminate\Database\Seeder;

class EquipmentTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        $data = ['lashing','advancement','camping','cooking','flags','snow','historical'];

        foreach($data as $tagName) {
            $tag = new \P4\Etag();
            $tag->name = $tagName;
            $tag->save();
        }
     }
}
