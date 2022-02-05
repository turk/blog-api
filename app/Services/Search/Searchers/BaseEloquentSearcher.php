<?php

declare(strict_types=1);

namespace App\Services\Search\Searchers;

use App\Services\Search\Pages\PageInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseEloquentSearcher implements SearcherInterface
{
    protected Builder $query;

    public function __construct(Builder $queryBuilder)
    {
        $this->query = $queryBuilder;
    }

    abstract protected function applyFilter(array $filter): void;

    protected function applySort(string $sort): void
    {
        $values = explode(".", $sort);
        $this->query->orderBy($values[0], $values[1]);
    }

    public function search(PageInterface $page, string $sort): Collection
    {
        $this->applySort($sort);

        return $this->query->offset($page->getFirstPosition())->limit($page->getPerPage())->get();
    }

    public function withFilters(array $filters): BaseEloquentSearcher
    {
        $this->applyFilter($filters);

        return $this;
    }

    public function count(): int
    {
        return $this->query->count();
    }
}
