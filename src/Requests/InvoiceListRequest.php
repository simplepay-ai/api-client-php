<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Requests;

use SimplePay\ApiClient\Enums\InvoiceStatus;

final class InvoiceListRequest
{
    /**
     * Application ID
     *
     * Required if API key not set
     */
    public ?string $appId = null;

    /**
     * Invoice status
     */
    public ?InvoiceStatus $status = null;

    /**
     * ID of end customer, who makes the payment
     */
    public ?string $clientId = null;
}
