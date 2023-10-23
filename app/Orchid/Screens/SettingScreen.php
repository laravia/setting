<?php

namespace Laravia\Setting\App\Orchid\Screens;

use Illuminate\Http\Request;
use Laravia\Setting\App\Models\Setting as ModelsSetting;
use Laravia\Setting\App\Orchid\Layouts\SettingListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class SettingScreen extends Screen
{

    public function query(): iterable
    {
        return [
            'settings' => ModelsSetting::orderByDesc('id')->paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'Setting Screen';
    }

    public function description(): ?string
    {
        return 'Settings of Laravia';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Create new setting')
                ->icon('pencil')
                ->route('laravia.setting.edit')
        ];
    }

    public function layout(): iterable
    {
        return [
            SettingListLayout::class
        ];
    }

    public function remove(Request $request): void
    {
        ModelsSetting::findOrFail($request->get('id'))->delete();

        Alert::info('You have successfully deleted the setting.');
    }
}
