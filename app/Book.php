<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = array();

    public function owner() {
      return $this->belongsTo('\P4\Owner');
    }

    public function tags() {
      return $this->belongsToMany('\P4\Tag')->withTimeStamps();
    }
}
