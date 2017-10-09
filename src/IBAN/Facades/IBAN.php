<?php namespace IBAN\Facades;

use IBAN\Services\IBANService;
use Illuminate\Support\Facades\Facade;

/**
 * @see \IBAN\Services\IBANService
 */
class IBAN extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return IBANService::class;
    }
}
