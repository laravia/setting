<?php

namespace Laravia\Setting\App\Orchid\Screens;

use Illuminate\Http\Request;
use Laravia\Heart\App\Laravia;
use Laravia\Setting\App\Models\Setting as ModelsSetting;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class SettingEditScreen extends Screen
{
    public $setting;

    public function query(ModelsSetting $setting): array
    {
        return [
            'setting' => $setting
        ];
    }

    public function name(): ?string
    {
        return $this->setting->exists ? 'Edit setting' : 'Creating a new setting';
    }

    public function description(): ?string
    {
        return "Settings";
    }

    public function commandBar(): array
    {
        return [
            Button::make('Create setting')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->setting->exists),

            Button::make('Update')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee($this->setting->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->setting->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::columns([
                Layout::rows([
                    Input::make('setting.key')
                        ->title('Key')
                        ->placeholder('Key')
                        ->required(),
                ]),
                Layout::rows([
                    Input::make('setting.value')
                        ->title('Value')
                        ->placeholder('Value')
                        ->required(),
                ]),
                Layout::rows([
                    Select::make('setting.project')
                        ->title('Project')
                        ->placeholder('Project')
                        ->required()
                        ->empty(__('Select or add a project'))
                        ->options(Laravia::getArrayWithDistinctFieldDataFromClassByKey(ModelsSetting::class, 'project'))
                        ->allowAdd()
                ])->canSee(count(Laravia::getDataFromConfigByKey('projects'))),
            ]),

        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->setting->fill($request->get('setting'))->save();

        Alert::info('You have successfully created a setting.');

        return redirect()->route('laravia.setting.list');
    }

    public function remove()
    {
        $this->setting->delete();

        Alert::info('You have successfully deleted the setting.');

        return redirect()->route('laravia.setting.list');
    }
}
