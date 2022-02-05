<?php

declare(strict_types=1);

namespace App\Services\Search\Pages;

class SinglePage implements PageInterface
{
    private int $pageNumber;

    private int $pageSize;

    public function __construct(int $pageSize = 10, int $pageNumber = 1)
    {
        \assert($pageSize > 0);
        \assert($pageNumber > 0);
        $this->pageSize = $pageSize;
        $this->pageNumber = $pageNumber;
    }

    public function getFirstPosition(): ?int
    {
        return $this->pageSize * ($this->pageNumber - 1);
    }

    public function getPerPage(): ?int
    {
        return $this->pageSize;
    }
}
