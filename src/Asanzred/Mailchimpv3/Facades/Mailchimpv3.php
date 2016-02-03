<?php

namespace Asanzred\Mailchimpv3\Facades;

use Illuminate\Support\Facades\Facade;

class Mailchimpv3 extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mailchimpv3';
    }
}