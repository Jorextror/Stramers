<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Register()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Register');
        $response->assertSee('register');
    }
}
