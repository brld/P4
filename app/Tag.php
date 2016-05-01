<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function books() {
      return $this->belongsToMany(\P4\Book)->withTimeStamps();
    }

    public static function getTagsForCheckboxes() {
      $tags = \P4\Tag::orderBy('name','ASC')->get();

      $tags_for_checkboxes = [];

      foreach ($tags as $tag) {
        $tags_for_checkboxes[$tag['id']] = $tag['name'];
      }

      return $tags_for_checkboxes;
    }
}
