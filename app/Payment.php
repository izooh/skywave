<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  //relation to Debtor Model
  public function debtor()
  {
    return $this->belongsTo('App\Debtor');
  }
}
