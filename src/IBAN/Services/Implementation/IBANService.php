<?php namespace IBAN\Services\Implementation;

use IBAN;

class IBANService implements \IBAN\Services\IBANService
{

    /**
     * @param string $iban
     * @param array $errors
     * @return bool
     */
    public function validate($iban, &$errors = [])
    {
        $validator = $this->getValidator($iban);

        if (!$validator->Verify()) {
            $errors[] = 'Not a valid IBAN';
            return false;
        } elseif (!$validator->VerifyChecksum()) {
            $errors[] = 'Not a valid checksum';
            return false;
        }

        return true;
    }

    /**
     * @param string $iban
     * @param array $errors
     * @return string|null
     */
    public function format($iban, &$errors = [])
    {
        $validator = $this->getValidator($iban);

        if (!$this->validate($iban, $errors)) {
            return null;
        }

        // Return validated and formatted result
        return $validator->HumanFormat();
    }

    /**
     * @param string $iban
     * @return string|null
     */
    public function getBank($iban)
    {
        $validator = $this->getValidator($iban);
        return $validator->Bank();
    }

    /**
     * @param string $iban
     * @return string|null
     */
    public function getBranch($iban)
    {
        $validator = $this->getValidator($iban);
        return $validator->Branch();
    }

    /**
     * @param string $iban
     * @return string|null
     */
    public function getAccount($iban)
    {
        $validator = $this->getValidator($iban);
        return $validator->Account();
    }

    /**
     * @param string $iban
     * @return string[]
     */
    public function getSuggestions($iban)
    {
        $validator = $this->getValidator($iban);
        return $validator->MistranscriptionSuggestions();
    }

    private function getValidator($iban)
    {
        return new IBAN(strtoupper(str_replace(' ', '', $iban)));
    }

}