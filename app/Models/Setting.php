<?php

namespace Laravia\Setting\App\Models;

use Laravia\Heart\App\Models\Model;
use Orchid\Screen\AsSource;

class Setting extends Model
{
    use AsSource;
    protected $fillable = [
        'project',
        'key',
        'value',
    ];

}
