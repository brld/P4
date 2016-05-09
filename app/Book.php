<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'owner', 'name', 'owner_id'];

    public function owner() {
      return $this->belongsTo('\P4\Owner');
    }

    public function tags() {
      return $this->belongsToMany('\P4\Tag')->withTimeStamps();
    }

    public function user() {
      return $this->belongsTo('\App\User');
    }
}
