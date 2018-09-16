<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function partner(){
      return $this->morphOne('App\Partner', 'partnerable');
    }
}
