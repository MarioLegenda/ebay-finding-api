<?php

namespace FindingAPI\Core\ItemFilter;

use FindingAPI\Core\Information\OutputSelectorInformation;

class OutputSelector extends BaseFindingDynamic
{
    /**
     * @return bool
     */
    public function validateDynamic() : bool
    {
        $validSelectors = OutputSelectorInformation::instance()->getAll();

        foreach ($this->dynamicValue as $filter) {
            if (in_array($filter, $validSelectors) === false) {
                $this->exceptionMessages[] = 'Invalid output selector '.$filter.'. Valid outputSelector types are '.implode(', ', $validSelectors);

                return false;
            }
        }

        return true;
    }
    /**
     * @param int $counter
     * @return string
     */
    public function urlify(int $counter) : string
    {
        $counter = 0;
        $final = '';
        foreach ($this->dynamicValue as $filter) {
            $final.='outputSelector('.$counter.')='.$filter.'&';

            $counter++;
        }

        return $final;
    }
}