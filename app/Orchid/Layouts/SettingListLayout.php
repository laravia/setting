<?php

namespace Laravia\Setting\App\Orchid\Layouts;

use Laravia\Setting\App\Models\Setting;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;

class SettingListLayout extends Table
{
    public $target = 'settings';

    public function columns(): array
    {
        return [

            TD::make('key', 'Key')->sort(),

            TD::make('value', 'Value')
                ->sort()
                ->render(function ($setting) {
                    return $setting->value;
                }),

            TD::make('project', 'Project')
                ->sort()
                ->render(function ($setting) {
                    return $setting->project;
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Setting $setting) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('laravia.setting.edit', $setting->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the setting entry is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $setting->id,
                            ]),
                    ]))
        ];
    }
}
