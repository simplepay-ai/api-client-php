<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Responses;

final class TransactionCreateErrorsResponse
{
    /**
     * 'required' | 'uuid4' | 'invalid'
     */
    public ?string $invoiceId = null;

    /**
     * 'required' | 'alphanum' | 'invalid'
     */
    public ?string $from = null;

    /**
     * 'required' | 'alpha' | 'uppercase' | 'invalid'
     */
    public ?string $cryptocurrency = null;

    /**
     * 'required' | 'alpha' | 'lowercase' | 'invalid'
     */
    public ?string $network = null;
}
