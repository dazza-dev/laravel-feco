<?php

namespace DazzaDev\LaravelFeco\Facades;

use DazzaDev\DianFeco\Client;
use Illuminate\Support\Facades\Facade;

class LaravelFeco extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-feco';
    }

    /**
     * Get the client instance.
     */
    public static function getClient(): Client
    {
        return app('laravel-feco');
    }
}
