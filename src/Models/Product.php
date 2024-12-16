<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Models;

use DateTime;

final class Product
{
    /**
     * Product ID
     */
    public string $id;

    /**
     * Product name
     */
    public string $name;

    /**
     * Product description
     */
    public ?string $description = null;

    /**
     * Product image
     */
    public ?string $image = null;

    /**
     * Product creation timestamp
     */
    public DateTime $createdAt;

    /**
     * Product update timestamp
     */
    public ?DateTime $updatedAt = null;

    /**
     * Product prices
     *
     * @var ProductPrice[]
     */
    public array $prices;
}
