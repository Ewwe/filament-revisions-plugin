<?php

namespace Ewwe\FilamentRevisionsPlugin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ewwe\FilamentRevisionsPlugin\FilamentRevisionsPlugin
 */
class FilamentRevisionsPlugin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ewwe\FilamentRevisionsPlugin\FilamentRevisionsPlugin::class;
    }
}
