<?php

namespace App\Repositories\Interfaces;

use App\Models\Tax;

/**
 * Repository for entity {@link Tax}.
 */
interface TaxRepositoryInterface
{
    /**
     * Find all taxes in the {@link Tax} entity.
     *
     * @return Tax[]
     */
    public function findAll();
}
