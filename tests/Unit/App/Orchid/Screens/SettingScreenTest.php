<?php

namespace Laravia\Setting\Tests\Unit\App\Orchid\Screens;

use Laravia\Heart\App\Classes\TestCase;
use Laravia\Heart\App\Classes\TestScreenCaseTrait;
use Laravia\Setting\App\Orchid\Screens\SettingScreen;

class SettingScreenTest extends TestCase
{

    use TestScreenCaseTrait;
    public function getScreenTestClass()
    {
        return new SettingScreen();
    }

}
