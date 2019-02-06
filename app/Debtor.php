<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
  protected $fillable=['fullname',
  'identityno',
  'debtor_no'	,
  'email',
  'accountnumber',
  'default',
  'interestrate',
  'originationdate',
  'duedate',
  'handoverdate',
  'handoveramount',
  'latefee',
  'client'];
  //one to Many relationship to Payment Model
public function payment()
  {

    return $this->hasMany('App\Payment','debtor_no','debtor_no');
  }
}
