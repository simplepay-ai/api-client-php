<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Requests;

final class TransactionListRequest
{
    /**
     * Invoice ID
     */
    public string $invoiceId;
}
