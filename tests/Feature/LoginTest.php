<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;


class LoginTest extends TestCase
{
  use RefreshDatabase;
  public function test_correct_response_after_login()
  {
    //create a user
          $user=factory(User::class)->create();

          //sending user info to the endpoint
          $this->postJson('/login',[
            'email'=>$user->email,
            'password'=>'secret'
          ])->assertStatus(200)
            ->assertJson(['status'=>'ok'])
            ->assertSessionHas('success','succefully logged in.');

  }

     public function test_a_user_receive_the_right_message_after_passing_wrong_credentials()
    {
      //create a new user
      $user=factory(User::class)->create();

      //sending user info to the endpoint
      $this->postJson('/login',[
        'email'=>$user->email,
        'password'=>'kendrick'
      ])->assertStatus(422)
        ->assertJson(['message'=>'Please check your email or Password']);

    }
}
