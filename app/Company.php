<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function partner(){
      return $this->morphOne('App\Partner', 'partnerable');
    }
}
