<?php

use Illuminate\Database\Seeder;

class equipmentTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
      {

          # First, create an array of all the equipment we want to associate tags with
          # The *key* will be the equipment item, and the *value* will be an array of tags.
          $equipment =[
              'Flagpole' => ['outdoors'],
              'Troop Scrapbook' => ['flags'],
              'American Flag' => ['flags','camping'],
              'Ropes' => ['lashing','advancement'],
              'PVC Pipes' => ['outdoors'],
              'Wooden Staffs' => ['lashing'],
              'Lashing Handbook' => ['lashing']
          ];

          # Now loop through the above array, creating a new pivot for each equipment to tag
          foreach($equipment as $item => $tags) {

              # First get the equipment
              $equipment = \P4\Equipment::where('item','like',$item)->first();

              # Now loop through each tag for this equipment, adding the pivot
              foreach($tags as $tagName) {
                  $tag = \P4\Tag::where('name','LIKE',$tagName)->first();

                  # Connect this tag to this equipment
                  $equipment->tags()->save($tag);
              }

          }
      }
  }
