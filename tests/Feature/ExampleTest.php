<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\User;

class ExampleTest extends TestCase
{

    public function testBasicTest()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/login');
        //$response = $this->get('/');

        $response->assertStatus(500);
    }
}
