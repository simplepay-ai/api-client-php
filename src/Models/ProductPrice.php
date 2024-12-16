<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Models;

final class ProductPrice
{
    /**
     * Currency
     */
    public Currency $currency;

    /**
     * Price
     */
    public float $price;
}
