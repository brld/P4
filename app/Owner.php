<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function books() {
      return $this->hasMany('\P4\Book');
    }
}
