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

    public function test_widget_description_max_one_hundred_characters()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        $this->expectExceptionMessageMatches('/data too long/i');

        $description = '1234567890'    // 10 chars
            . '1234567890'      // 20 chars
            . '1234567890'      // 30 chars
            . '1234567890'      // 40 chars
            . '1234567890'      // 50 chars
            . '1234567890'      // 60 chars
            . '1234567890'      // 70 chars
            . '1234567890'      // 80 chars
            . '1234567890'      // 90 chars
            . '1234567890'      // 100 chars
            . '1';              // 101 chars

        $widget = Widget::factory()->create([
            'name' => 'Test Widget',
            'description' => $description
        ]);
    }
}
