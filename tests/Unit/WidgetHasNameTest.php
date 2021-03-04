<?php

namespace Tests\Unit;

use App\Models\Widget;
use Tests\TestCase;

class WidgetHasNameTest extends TestCase
{
    public function test_create_widget_with_name()
    {
        $name = 'Test Widget';
        $widget = Widget::factory()->create([
            'name' => $name
        ]);

        $this->assertEquals($name, $widget->name);
    }

    public function test_widget_name_is_required()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        $this->expectExceptionMessageMatches('/cannot be null/i');

        $widget = Widget::factory()->create([
            'name' => null
        ]);
    }
    public function test_widget_name_max_twenty_character()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        $this->expectExceptionMessageMatches('/data too long/i');

        $name = '12345678901234567890extralength';
        $widget = Widget::factory()->create([
            'name' => $name
        ]);
    }
}
