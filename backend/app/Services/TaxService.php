<?php

namespace App\Services;

use App\Exceptions\TaxNotFoundException;
use App\Models\Tax;
use App\Repositories\Interfaces\TaxRepositoryInterface;
use App\Services\Interfaces\TaxServiceInterface;
use Dotenv\Dotenv;
use Illuminate\Support\Facades\Redis;
use InvalidArgumentException;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;
use Monospice\LaravelRedisSentinel\Contracts\Factory as RedisSentinel;
use Psr\Log\LoggerInterface;
use Webmozart\Assert\Assert;

use function PHPUnit\Framework\assertNull;

/**
 * TaxService implementation for {@link TaxServiceInterface} service.
 *
 * @author Emil Shari <emil.shari87@gmail.com>
 */
final class TaxService implements TaxServiceInterface
{
    /**
     * Creates an instance of {@link TaxService}.
     *
     * @param Log $logger provider, which will be  logger all of the requests.
     * @param TaxRepositoryInterface $taxRepository
     */
    public function __construct(
        private LoggerInterface $logger,
        private TaxRepositoryInterface $taxRepository,
    ) {
    }

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
    public function findAll(): iterable
    {
        $this->logger->debug("Request to find all taxes in provided entity");

        /** @internal findAll by repository. */
        return  $this->taxRepository->findAll();
    }
}
