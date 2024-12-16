<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Requests;

final class CryptocurrencyListRequest
{
    /**
     * Return cryptocurrencies for specific App ID
     */
    public ?string $appId = null;

    /**
     * Include cryptocurrency rates in response
     */
    public ?bool $rates = null;

    /**
     * Include networks list in response
     */
    public ?bool $networks = null;
}
