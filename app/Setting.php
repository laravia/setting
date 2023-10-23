<?php

namespace Laravia\Setting\App;

use Laravia\Setting\App\Models\Setting as ModelsSetting;

class Setting
{
    public static function getByKey($key): string
    {
        $setting = ModelsSetting::where('key', $key);
        if ($setting->first()) {
            return $setting->first()->value;
        }
        return false;
    }

    public static function getByKeyAndProject($key, $project = null): string
    {
        $setting = ModelsSetting::where('key', $key);
        if ($project) {
            $setting->where('project', $project);
        }
        if ($setting->first()) {
            return $setting->first()->value;
        }
        return false;
    }
}
