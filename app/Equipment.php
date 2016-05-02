<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['item', 'owner', 'name', 'owner_id'];

    public function owner() {
      return $this->belongsTo('\P4\Owner');
    }
}
