<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Requests;

final class InvoiceCreateRequest
{
    /**
     * Application ID
     */
    public string $appId;

    /**
     * Invoice type
     *
     * 'payment'
     */
    public string $type;

    /**
     * Parent invoice ID
     */
    public ?string $parentId = null;

    /**
     * ID of end customer, who makes the payment
     */
    public string $clientId;

    /**
     * Fiat currency symbol (ISO 4217 alphabetic code)
     *
     * @see https://en.wikipedia.org/wiki/ISO_4217
     */
    public string $currency;

    /**
     * Total in fiat currency
     *
     */
    public ?float $total = null;

    /**
     * Custom data attached to invoice
     */
    public ?array $payload = null;

    /**
     * Products
     *
     * @var ?InvoiceCreateProduct[]
     */
    public ?array $products = null;
}
