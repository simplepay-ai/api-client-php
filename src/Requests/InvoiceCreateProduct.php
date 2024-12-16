<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Requests;

final class InvoiceCreateProduct
{
    /**
     * Product ID
     */
    public string $id;

    /**
     * Products count
     */
    public int $count;
}
