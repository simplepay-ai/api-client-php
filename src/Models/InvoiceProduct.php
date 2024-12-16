<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Models;

final class InvoiceProduct
{
    /**
     * Product
     */
    public Product $product;

    /**
     * Count
     */
    public int $count;
}
