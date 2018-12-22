<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

  protected $fillable = [
      'Debtor_no', 'LastPaymentAmount', 'LastPaymentDate','currentBalance'
  ];
  //relation to Debtor Model
  public function debtor()
  {
    return $this->belongsTo('App\Debtor');
  }
}
