<?php

namespace Laravia\Setting\Tests\Unit\App;

use Laravia\Setting\App\Models\Setting;
use Laravia\Heart\App\Classes\TestCase;

class SettingModelTest extends TestCase
{
    public function testInitClass()
    {
        $this->assertClassExist(Setting::class);
    }

    public function testCreateSetting()
    {
        $project = $this->faker->word;
        $key = $this->faker->word;
        $value = $this->faker->word;

        Setting::create([
            'project' => $project,
            'key' => $key,
            'value' => $value,
        ]);

        $this->assertDatabaseHas('settings', [
            'project' => $project,
            'key' => $key,
            'value' => $value,
        ]);
    }
}
