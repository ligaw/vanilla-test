<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class RequireTokenTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Show a list widgets as json
     *
     * @return void
     */
    public function test_401_returned_with_no_token()
    {
        $response = $this->getJson('/');

        $response->assertStatus(401);
    }

    public function test_200_returned_with_token()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );
        $response = $this->getJson('/');

        $response->assertStatus(200);
    }
}
