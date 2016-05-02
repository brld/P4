<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class ETag extends Model
{
  public function equipment() {
    return $this->belongsToMany(\P4\Equipment)->withTimeStamps();
  }

  public static function getTagsForCheckboxes() {
    $tags = \P4\ETag::orderBy('name','ASC')->get();

    $etags_for_checkboxes = [];

    foreach ($tags as $tag) {
      $tags_for_checkboxes[$tag['id']] = $tag['name'];
    }

    return $etags_for_checkboxes;
  }
}
