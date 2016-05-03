<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Etag extends Model
{
  public function equipment() {
    return $this->belongsToMany(\P4\Equipment)->withTimeStamps();
  }

  public static function getTagsForCheckboxes() {
    $tags = \P4\Etag::orderBy('name','ASC')->get();

    $etags_for_checkboxes = [];

    foreach ($tags as $tag) {
      $etags_for_checkboxes[$tag['id']] = $tag['name'];
    }

    return $etags_for_checkboxes;
  }
}
