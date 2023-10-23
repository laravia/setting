<?php

namespace Laravia\Setting\Tests\Unit;

use Laravia\Heart\App\Classes\TestCase;
use Laravia\Setting\App\Models\Setting as ModelsSetting;
use Laravia\Setting\App\Setting;

class SettingTest extends TestCase
{
    public function testInitClass()
    {
        $this->assertClassExist(Setting::class);
    }

    /**
     * @dataProvider dataProviderData
     *
     */
    public function testGetByKey($key, $value)
    {
        ModelsSetting::create([
            'key' => $key,
            'value' => $value
        ]);
        $this->assertIsString(Setting::getByKey($key));
        $this->assertEquals($value, Setting::getByKey($key));
    }

    /**
     * @dataProvider dataProviderData
     *
     */
    public function testGetByKeyAndProject($key, $value, $project)
    {
        ModelsSetting::create([
            'key' => $key,
            'value' => $value,
            'project' => $project,
        ]);
        $this->assertIsString(Setting::getByKeyAndProject($key, $project));
        $this->assertEquals($value, Setting::getByKeyAndProject($key, $project));
    }

    public static function dataProviderData()
    {
        yield 'without project' => [
            'key' => 'testkey 1',
            'value' => 'test 1',
            'project' => null,
        ];
        yield 'with project' => [
            'key' => 'testkey 2',
            'value' => 'test 2',
            'project' => 'testproject',
        ];
        yield 'with project without value' => [
            'key' => 'testkey 3',
            'value' => '',
            'project' => 'testproject 2',
        ];
    }

    public function testGetNotExistingEntryWithoutError()
    {
        $this->assertIsString(Setting::getByKey('undefined'));
    }
}
