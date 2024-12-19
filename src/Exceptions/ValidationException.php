<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Exceptions;

use Exception;

final class ValidationException extends Exception
{
    public function __construct(
        public mixed $errors
    ) {
    }
}
