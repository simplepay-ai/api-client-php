<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Models;

final class Currency
{
    /**
     * Currency ID
     */
    public string $id;
    
    /**
     * Currency symbol (ISO 4217 alphabetic code)
     *
     * @see https://en.wikipedia.org/wiki/ISO_4217
     */
    public string $symbol;
    
    /**
     * Currency code (ISO 4217 numeric code)
     *
     * @see https://en.wikipedia.org/wiki/ISO_4217
     */
    public int $code;
}
