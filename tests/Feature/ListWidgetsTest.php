<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Widget;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ListWidgetsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Show a list widgets as json
     *
     * @return void
     */
    public function test_widget_list_is_json()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $widget = Widget::factory()->create([
            'name' => 'Test Widget'
        ]);

        $response = $this->get('/api/widgets');

        $response->assertOk();
        $response->assertJson([['name' => $widget->name]]);
    }
}
