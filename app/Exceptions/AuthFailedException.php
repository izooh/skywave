<?php
namespace App\Exceptions;
use Exception;

/**
 *
 */
class AuthFailedException extends Exception
{

  public function render()
  {
    // displaying login error code...
    return response()->json(['message'=>'Please check your email or Password'],422);
  }
}
