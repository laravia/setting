<?php

namespace Laravia\Setting\Tests\Feature\App\Orchid\Screens;

use Laravia\Heart\App\Classes\TestCase;

class SettingScreenFeatureTest extends TestCase
{

    public function test_setting_screen_can_be_rendered()
    {
        $this->actAsAdmin();
        $response = $this->get(route('laravia.setting.list'));
        $response->assertOk();
    }

}
