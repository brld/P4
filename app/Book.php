<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title'];

    public function author() {
      return $this->belongsTo('P4\Author');
    }
}
