<?php

namespace FindingAPI\Core\ItemFilter;

class SoldItemsOnly extends BaseFindingDynamic
{
    /**
     * @return bool
     */
    public function validateDynamic() : bool
    {
        if (!$this->genericValidation($this->dynamicValue, 1)) {
            return false;
        }

        return parent::checkBoolean($this->dynamicValue[0]);
    }
}