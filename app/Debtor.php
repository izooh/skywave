<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
  //one to Many relationship to Payment Model
public function payment()
  {
    return $this->hasMany('App\Payment');
  }
}
