<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Models;

use DateTime;
use SimplePay\ApiClient\Enums\TransactionStatus;

final class Transaction
{
    /**
     * Transaction ID
     */
    public string $id;

    /**
     * Invoice ID
     */
    public string $invoiceId;

    /**
     * Wallet address from which customer made payment
     */
    public string $from;

    /**
     * Wallet address of payment recipient
     */
    public string $to;

    /**
     * Received amount in cryptocurrency
     */
    public ?string $amount = null;

    /**
     * Exchange rate to fiat currency
     */
    public string $rate;

    /**
     * Transaction hash
     */
    public ?string $hash;

    /**
     * Block number
     */
    public ?int $block;

    /**
     * Transaction status
     */
    public TransactionStatus $status;

    /**
     * Transaction creation timestamp
     */
    public DateTime $createdAt;

    /**
     * Transaction update timestamp
     */
    public DateTime $updatedAt;

    /**
     * Transaction expiration timestamp
     */
    public DateTime $expireAt;

    /**
     * Transaction cryptocurrency
     */
    public Cryptocurrency $cryptocurrency;

    /**
     * Transaction network
     */
    public Network $network;
}
