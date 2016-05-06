<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['id', 'name', 'apply_to'];

    public function books() {
      return $this->belongsToMany(\P4\Book)->withTimeStamps();
    }

    public static function getTagsForCheckboxes() {
      $tags = \P4\Tag::where('apply_to','=','books')->get();

      $tags_for_checkboxes = [];

      foreach ($tags as $tag) {
        $tags_for_checkboxes[$tag['id']] = $tag['name'];
      }

      return $tags_for_checkboxes;
    }

    public static function getEquipmentTagsForCheckboxes() {
      $tags = \P4\Tag::where('apply_to','=','equipment')->get();

      $equipment_tags_for_checkboxes = [];

      foreach ($tags as $tag) {
        $equipment_tags_for_checkboxes[$tag['id']] = $tag['name'];
      }

      return $tags_for_checkboxes;
    }
}
