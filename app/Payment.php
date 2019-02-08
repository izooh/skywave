<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

  protected $fillable = [
      'debtor_no', 'lastpaymentamount', 'lastpaymentdate','currentbalance'
  ];
  //relation to Debtor Model
  public function debtor()
  {
    return $this->belongsTo('App\Debtor');
  }
}
