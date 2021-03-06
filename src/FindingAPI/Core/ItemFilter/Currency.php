<?php

namespace FindingAPI\Core\ItemFilter;

use FindingAPI\Core\Information\CurrencyInformation;

class Currency extends BaseFindingDynamic
{
    /**
     * @return bool
     */
    public function validateDynamic() : bool
    {
        if (!$this->genericValidation($this->dynamicValue, 1)) {
            return false;
        }

        $allowedCurrencies = CurrencyInformation::instance()->getAll();

        $currency = strtoupper($this->dynamicValue[0]);

        if (in_array($currency, $allowedCurrencies) === false) {
            $this->exceptionMessages[] = 'Invalid Currency item filter value supplied. Allowed currencies are '.implode(',', $allowedCurrencies);

            return false;
        }

        return true;
    }
}