<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['owner_id'];

    public function books() {
      return $this->hasMany('\P4\Book');
    }

    public function equipment() {
      return $this->hasMany('\P4\Equipment');
    }

    public static function ownersForDropdown() {


      $owners = \P4\Owner::orderBy('last_name','ASC')->get();
      $owners_for_dropdown = [];
      $owners_for_dropdown[0] = '- Select an owner -';

      foreach ($owners as $owner) {
        $owners_for_dropdown[$owner->id] = $owner->last_name.', '.$owner->first_name;
      }

      return $owners_for_dropdown;
    }
}
