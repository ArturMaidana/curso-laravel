<?php

namespace App\Repositories;
use stdClass;


use Illuminate\Pagination\LengthAwarePaginator;

class PaginationPresente implements PaginationInterface
{

     /**
     * @var stdClass[]
    */

    private array $items;

    public function __construct(
        protected LengthAwarePaginator $paginator,
    ){}

       /**
     * @return stdClass[]
    */

    public function items(): array
    {
        return array_map(function ($item) {
                    return (object) (is_array($item) ? $item : $item->toArray());
                }, $this->paginator->items());

    }

    public function total(): int
    {
        return $this->paginator->total() ?? 0;

    }

    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();

    }
    public function isLastPage(): bool
    {
        return $this->paginator->currentPage() === $this->paginator->lastPage();

    }
    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }
    public function getNumberNextPage(): int
    {
        return $this->paginator->currentPage() + 1;

    }
    public function getNumberPreviousPage(): int
    {
        return $this->paginator->currentPage() - 1;

    }
}
