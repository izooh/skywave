<?php

namespace Tests\Feature;
use Mail;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
public function test_a_user_has_a_username_after_registration()

{
  $this->withoutExceptionHandling();
$this->post('/register',[
  'name'=>'isaac brown',
  'email'=>'crazyninja@hacker.com',
  'password'=>'secret'
])->assertStatus(302);

}
public function test_an_email_is_sent_to_newly_registered_users()
{
  $this->withoutExceptionHandling();
  Mail::fake();
  //register a new user
  $this->post('/register',[
    'name'=>'isaac brown',
    'email'=>'crazyninja@hacker.com',
    'password'=>'secret'
  ])->assertRedirect();
  Mail::assertSent(ConfirmYourEmail::class );

}
}
