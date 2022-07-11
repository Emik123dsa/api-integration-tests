<?php

namespace App\Exceptions;

use Exception;

class TaxIdentificationAlreadyExistsException extends EntityNotFoundException
{
    /* Default error code, which will required for common cases. */
    private const ERROR_CODE = 'error.entityNotFound';

    /**
     * Creates new runtime exception with corresponded {@link $message}.
     *
     * @param string $message which will be resolved as provided message, other
     *               current message may also be fetched via {@link #getMessage()} method.
     */
    public function __construct(string $message)
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
