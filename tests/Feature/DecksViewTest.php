<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DecksViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Decks()
    {
        $usuario = User::find(1);
        $this->actingAs($usuario);

        $response = $this->get('/mazo');
        $response->assertStatus(200);
        $response->assertSee('Stramers');
    }
}
