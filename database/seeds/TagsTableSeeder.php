<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       $data = ['outdoors','maps','high-adventure','camping','classic'];

       foreach($data as $tagName) {
           $tag = new \P4\Tag();
           $tag->name = $tagName;
           $tag->save();
       }
     }
}
