<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Requests;

final class TransactionCreateRequest
{
    /**
     * Invoice ID
     */
    public string $invoiceId;

    /**
     * Wallet address from which customer made payment
     *
     */
    public string $from;

    /**
     * Cryptocurrency symbol
     */
    public string $cryptocurrency;

    /**
     * Network symbol
     */
    public string $network;
}
