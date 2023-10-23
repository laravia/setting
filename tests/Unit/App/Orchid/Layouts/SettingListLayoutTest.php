<?php

namespace Laravia\Setting\Tests\Unit\App\Orchid\Layouts;

use Laravia\Setting\App\Orchid\Layouts\SettingListLayout;
use Laravia\Heart\App\Classes\TestCase;

class SettingListLayoutTest extends TestCase
{

    public $class = 'Laravia\Setting\App\Orchid\Layouts\SettingListLayout';

    public function testInitClass()
    {
        $this->assertClassExist($this->class);
    }

    public function testColumnsExist()
    {
        $this->assertMethodInClassExists('columns', SettingListLayout::class);
    }
    public function testColumns()
    {
        $this->assertIsArray((new SettingListLayout)->columns());
    }
}
