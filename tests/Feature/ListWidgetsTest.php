<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $widget = Widget::factory()->create([
            'name' => 'Test Widget'
        ]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertJson(['name' => $widget->name]);
    }
}
