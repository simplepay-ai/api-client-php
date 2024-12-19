<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Models;

final class Cryptocurrency
{
    /**
     * Cryptocurrency ID
     */
    public string $id;

    /**
     * Cryptocurrency symbol
     */
    public string $symbol;

    /**
     * Cryptocurrency name
     */
    public string $name;

    /**
     * Number of decimal places
     */
    public int $decimals;

    /**
     * Is stablecoin
     */
    public bool $stable;

    /**
     * List of blockchains in which cryptocurrency may be accepted
     *
     * @var ?Network[]
     */
    public ?array $networks = null;

    /**
     * Conversion rates to fiat currencies
     *
     * Key is ISO 4217 alphabetic code of fiat currency
     *
     * Value is price for 1 coin
     *
     * @see https://en.wikipedia.org/wiki/ISO_4217
     *
     * @var ?array<string, float>
     */
    public ?array $rates = null;
}
