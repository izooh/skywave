<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
  protected $fillable = [
      'Contact_Type', 'Contact_Status', 'reason','PTP_amount','PTP_date','Call_date'
  ];
}
