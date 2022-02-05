<?php

declare(strict_types=1);

namespace App\Services\Search\Searchers;

use App\Services\Search\Pages\PageInterface;
use Illuminate\Database\Eloquent\Collection;

interface SearcherInterface
{
    public function search(PageInterface $page, string $sort): Collection;

    public function count(): int;

    public function withFilters(array $filters): self;
}
