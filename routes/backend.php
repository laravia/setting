<?php

use Illuminate\Support\Facades\Route;
use Laravia\Setting\App\Orchid\Screens\SettingEditScreen;
use Laravia\Setting\App\Orchid\Screens\SettingScreen;
use Tabuna\Breadcrumbs\Trail;

$prefix = config('platform.prefix');

Route::middleware(['web', 'auth', 'platform'])->group(function () use ($prefix) {

    Route::screen($prefix . '/settings', SettingScreen::class)
        ->name('laravia.setting.list')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('platform.index')
                ->push('Setting');
        });

    Route::screen($prefix . '/setting/{setting?}', SettingEditScreen::class)
        ->name('laravia.setting.edit')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('laravia.setting.list')
            ->push(__('Setting edit or create'), route('laravia.setting.list')));

});
