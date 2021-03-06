<?php

namespace FindingAPI\Core\ItemFilter;

use FindingAPI\Core\Information\GlobalIdInformation;

class ListedIn extends BaseFindingDynamic
{
    /**
     * @return bool
     */
    public function validateDynamic() : bool
    {
        if (!$this->genericValidation($this->dynamicValue, 1)) {
            return false;
        }

        $filter = $this->dynamicValue[0];

        if (!GlobalIdInformation::instance()->has($filter)) {
            $this->exceptionMessages[] = $this->name.' has to have a valid global id. Please, refer to http://developer.ebay.com/devzone/finding/callref/Enums/GlobalIdList.html or use FindingAPI\Core\ItemFilter\GlobalId object';

            return false;
        }

        return true;
    }
}