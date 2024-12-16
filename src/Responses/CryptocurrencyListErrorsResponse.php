<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Responses;

final class CryptocurrencyListErrorsResponse
{
    /**
     * 'uuid4'
     */
    public ?string $appId = null;

    /**
     * 'boolean'
     */
    public ?string $rates = null;

    /**
     * 'boolean'
     */
    public ?string $networks = null;
}
