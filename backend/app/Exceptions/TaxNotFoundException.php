<?php

namespace App\Exceptions;

/**
 * Tax Not Found Exception.
 *
 * @author EmilShari <emil.shari87@gmail.com>
 */
final class TaxNotFoundException extends EntityNotFoundException
{
    /* Default error code for {@link Tax} entity, which has not been found. */
    private const ERROR_CODE = 'error.taxNotFound';

    /**
     * Creates new runtime exception with corresponded {@link $message}.
     *
     * @param string $message which will be resolved as provided message, other
     *               current message may also be fetched via {@link #getMessage()} method.
     */
    public function __construct(?string $message)
    {
        parent::__construct($message);
    }

    /**
     * Return error code of exception.
     *
     * @return string
     */
    public function getErrorCode(): string
    {
        return self::ERROR_CODE;
    }
}
