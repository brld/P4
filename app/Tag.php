<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function books() {
      return $this->belongsToMany(\P4\Book)->withTimeStamps();
    }
}
