<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CurrentDayInHeaderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Show a list widgets as json
     *
     * @return void
     */
    public function test_for_x_day_header()
    {
        $response = $this->getJson('/');

        $response->assertHeader('X-Day', date("l"));
    }

}
