<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Widget;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class WidgetAvailableViaHttpVerbsTest extends TestCase
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );
    }

    public function test_resource_available_via_get()
    {
        Widget::factory()->create([
            'name' => 'Test Widget',
            'description' => 'Test Description'
        ]);

        $response = $this->getJson('/api/widgets');

        $response->assertStatus(200)
            ->assertJson([[
                'name' => 'Test Widget',
            ]]);

    }

    public function test_resource_available_via_id()
    {
        $widget = Widget::factory()->create([
            'name' => 'Test Widget',
            'description' => 'Test Description'
        ]);

        $response = $this->getJson("/api/widgets/{$widget->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $widget->id,
            ]);

    }

    public function test_resource_available_via_post()
    {
        $response = $this->postJson('/api/widgets', ['name' => 'Test Widget']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'name' => 'Test Widget'
            ]);
    }

    public function test_resource_available_via_patch()
    {
        $widget = Widget::factory()->create([
            'name' => 'Test Widget',
            'description' => 'Test Description'
        ]);

        $response = $this->patchJson("/api/widgets/{$widget->id}", ['name' => 'Updated Widget']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Updated Widget'
            ]);
    }

    public function test_resource_available_via_delete()
    {
        $widget = Widget::factory()->create([
            'name' => 'Test Widget',
            'description' => 'Test Description'
        ]);

        $response = $this->deleteJson("/api/widgets/{$widget->id}");

        $response->assertStatus(200);
    }
}
