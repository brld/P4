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
       $bookData = ['outdoors','maps','high-adventure','camping','classic'];
       $equipmentData = ['lashing','advancement','cooking','outdoors','camping','flags'];

       foreach($bookData as $tagName) {
         $tag = new \P4\Tag();
         $tag->name = $tagName;
         $tag->apply_to = 'books';
         $tag->save();
       }

       foreach ($equipmentData as $tagName) {
         $tag = new \P4\Tag();
         $tag->name = $tagName;
         $tag->apply_to = 'equipment';
         $tag->save();
       }
     }
}
