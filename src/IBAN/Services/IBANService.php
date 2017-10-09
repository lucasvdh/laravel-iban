<?php namespace IBAN\Services;


interface IBANService
{

    /**
     * @param string $iban
     * @param array $errors
     * @return bool
     */
    public function validate($iban, &$errors = []);

    /**
     * @param string $iban
     * @param array $errors
     * @return string|null
     */
    public function format($iban, &$errors = []);

    /**
     * @param string $iban
     * @return string|null
     */
    public function getBank($iban);

    /**
     * @param string $iban
     * @return string|null
     */
    public function getBranch($iban);

    /**
     * @param string $iban
     * @return string|null
     */
    public function getAccount($iban);

    /**
     * @param string $iban
     * @return string[]
     */
    public function getSuggestions($iban);

}