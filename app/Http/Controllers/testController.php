<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class testController extends Controller
{
  public function login(Request $request)
  {

          $this->validate($request,[
              'email'=>'required',
              'password'=>'required'
          ]);

          $articles=new Article;

          $articles->email=$request->input('email');
          $articles->password=$request->input('password');
          if($articles->save())
          {
           return($articles);
          }
          else {
            return 'failed';
          }
}
}
