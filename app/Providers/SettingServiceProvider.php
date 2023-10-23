<?php

namespace Laravia\Setting\App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravia\Heart\App\Traits\ServiceProviderTrait;

class SettingServiceProvider extends ServiceProvider
{
    use ServiceProviderTrait;

    protected $name = "setting";

    public function boot(): void
    {
        $this->defaultBootMethod();
    }
}
