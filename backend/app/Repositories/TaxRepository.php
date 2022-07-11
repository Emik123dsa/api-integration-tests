<?php

namespace App\Repositories;

use App\Models\Tax;
use App\Repositories\Interfaces\TaxRepositoryInterface;
use Rx\Observable;
use Rx\Scheduler;

/**
 * JPA Repository for entity {@link Tax}.
 */
class TaxRepository implements TaxRepositoryInterface
{
    /**
     * Find all taxes in the {@link Tax} entity.
     *
     * @return Tax[]
     */
    public function findAll()
    {
        return Tax::all();
    }
}
