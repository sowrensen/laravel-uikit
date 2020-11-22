<?php

namespace Sowren\Package\Facades;

use Illuminate\Support\Facades\Facade;

class SamplePackage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SamplePackage';
    }
}
