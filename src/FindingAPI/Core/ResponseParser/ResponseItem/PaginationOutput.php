<?php

namespace FindingAPI\Core\ResponseParser\ResponseItem;

use FindingAPI\Core\Response\ArrayConvertableInterface;

class PaginationOutput extends AbstractItem implements ArrayConvertableInterface
{
    /**
     * @var int $entriesPerPage
     */
    private $entriesPerPage;
    /**
     * @var int $pageNumber
     */
    private $pageNumber;
    /**
     * @var int $totalEntries
     */
    private $totalEntries;
    /**
     * @var int $totalPages
     */
    private $totalPages;

    /**
     * @param null $default
     * @return int|null
     */
    public function getEntriesPerPage($default = null)
    {
        if ($this->entriesPerPage === null) {
            if (isset($this->simpleXml->entriesPerPage)) {
                $this->setEntriesPerPage((int) $this->simpleXml->entriesPerPage);
            }
        }

        if ($this->entriesPerPage === null and $default !== null) {
            return $default;
        }

        return $this->entriesPerPage;
    }
    /**
     * @param null $default
     * @return int|null
     */
    public function getPageNumber($default = null)
    {
        if ($this->pageNumber === null) {
            if (isset($this->simpleXml->pageNumber)) {
                $this->setPageNumber((int) $this->simpleXml->pageNumber);
            }
        }

        if ($this->pageNumber === null and $default !== null) {
            return $default;
        }

        return $this->pageNumber;
    }
    /**
     * @param null $default
     * @return int|null
     */
    public function getTotalEntries($default = null)
    {
        if ($this->totalEntries === null) {
            if (isset($this->simpleXml->totalEntries)) {
                $this->setTotalEntries((int) $this->simpleXml->totalEntries);
            }
        }

        if ($this->totalEntries === null and $default !== null) {
            return $default;
        }

        return $this->totalEntries;
    }
    /**
     * @param null $default
     * @return int|null
     */
    public function getTotalPages($default = null)
    {
        if ($this->totalPages === null) {
            if (isset($this->simpleXml->totalPages)) {
                $this->setTotalPages((int) $this->simpleXml->totalPages);
            }
        }

        if ($this->totalPages === null and $default !== null) {
            return $default;
        }

        return $this->totalPages;
    }
    /**
     * @return array
     */
    public function toArray(): array
    {
        return array(
            'entriesPerPage' => $this->getEntriesPerPage(),
            'pageNumber' => $this->getPageNumber(),
            'totalEntries' => $this->getTotalEntries(),
            'totalPages' => $this->getTotalPages(),
        );
    }

    private function setTotalEntries(int $totalEntries) : PaginationOutput
    {
        $this->totalEntries = $totalEntries;

        return $this;
    }

    private function setPageNumber(int $pageNumber) : PaginationOutput
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }

    private function setEntriesPerPage(int $entriesPerPage) : PaginationOutput
    {
        $this->entriesPerPage = $entriesPerPage;

        return $this;
    }

    private function setTotalPages(int $totalPages) : PaginationOutput
    {
        $this->totalPages = $totalPages;

        return $this;
    }
}