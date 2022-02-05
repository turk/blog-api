<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class BaseApiController extends Controller
{
    protected function getQuerySort(array $query, string $defaultSort = null): ?string
    {
        return !empty($query['sort']) ? $query['sort'] : $defaultSort;
    }

    public function getQueryPageNr(array $query, int $defaultPage = 1): int
    {
        return (int)(!empty($query['pageNr']) ? $query['pageNr'] : $defaultPage);
    }

    public function getQueryPageSize(array $query, int $defaultSize = 10): int
    {
        return (int)(!empty($query['pageSize']) ? $query['pageSize'] : $defaultSize);
    }
}
