<?php

namespace App\Services\Interfaces;

use App\Models\Tax;

/**
 * TaxService implementation for {@link TaxServiceInterface} service.
 *
 * @author Emil Shari <emil.shari87@gmail.com>
 */
interface TaxServiceInterface
{
    /**
     * Find all taxes without their identificators.
     *
     * {@inheritDoc}
     *
     * @return Tax[] all taxes in repository.
     *
     * @throws TaxNotFoundException if the taxes were not found.
     * @throws InvalidArgumentException if the request was interrupted.
     */
    public function findAll(): iterable;
}
