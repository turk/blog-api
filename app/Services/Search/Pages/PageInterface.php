<?php

declare(strict_types=1);

namespace App\Services\Search\Pages;

interface PageInterface
{
    public function getFirstPosition(): ?int;

    public function getPerPage(): ?int;
}
