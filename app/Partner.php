<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public function partnerable(){
      return $this->morphTo();
    }
}
