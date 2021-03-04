<?php

namespace Tests\Unit;

use App\Models\Widget;
use Tests\TestCase;

class WidgetHasOptionalDescriptionTest extends TestCase
{
    public function test_create_widget_with_description()
    {
        $description = 'This is a test description';
        $widget = Widget::factory()->create([
            'name' => 'Test Widget',
            'description' => $description
        ]);

        $this->assertEquals($description, $widget->description);
    }

    public function test_create_widget_without_description()
    {
        $widget = Widget::factory()->create([
            'name' => 'Test Widget',
        ]);

        $this->assertEquals(null, $widget->description);
    }

}
