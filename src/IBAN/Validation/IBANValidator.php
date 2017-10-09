<?php namespace IBAN\Validation;

use IBAN\Services\IBANService;
use Illuminate\Validation\Validator;

class IBANValidator extends Validator
{

    public function validateIban($attribute, $value, $parameters)
    {
        $IBANService = $this->container->make(IBANService::class);
        return $IBANService->validate($value);
    }

}