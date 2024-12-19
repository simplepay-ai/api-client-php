<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Models;

use DateTime;
use SimplePay\ApiClient\Enums\InvoiceStatus;

final class Invoice
{
    /**
     * Invoice ID
     */
    public string $id;

    /**
     * Parent invoice ID
     */
    public ?string $parentId = null;

    /**
     * ID of end customer, who makes the payment
     */
    public string $clientId;

    /**
     * Invoice total in fiat currency
     */
    public string $total;

    /**
     * Invoice paid amount in fiat currency
     */
    public string $paid;

    /**
     * Invoice type
     *
     * 'payment'
     */
    public string $type;

    /**
     * Invoice status
     */
    public InvoiceStatus $status;

    /**
     * Invoice creation timestamp
     */
    public DateTime $createdAt;

    /**
     * Invoice update timestamp
     */
    public DateTime $updatedAt;

    /**
     * Invoice fiat currency
     */
    public Currency $currency;

    /**
     * Custom data attached to invoice
     */
    public ?array $payload = null;

    /**
     * Invoice products
     *
     * @var InvoiceProduct[]
     */
    public array $products;

    /**
     * App invoice related to
     *
     * To get invoice with this field, pass `app: true` to `invoice.get` method
     */
    public ?App $app;
}
