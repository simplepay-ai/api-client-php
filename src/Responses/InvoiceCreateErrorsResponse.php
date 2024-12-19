<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Responses;

final class InvoiceCreateErrorsResponse
{
    /**
     * 'required' | 'uuid4' | 'invalid'
     */
    public ?string $appId = null;

    /**
     * 'required' | 'oneof'
     */
    public ?string $type = null;

    /**
     * 'uuid4'
     */
    public ?string $parentId = null;

    /**
     * 'required' | 'ascii' | 'max' | 'invalid'
     */
    public ?string $clientId = null;

    /**
     * 'required' | 'alpha' | 'uppercase' | 'invalid'
     */
    public ?string $currency = null;

    /**
     * 'required_without' | 'numeric' | 'gte' | 'lte'
     */
    public ?string $total = null;

    /**
     * 'len'
     */
    public ?string $payload = null;

    /**
     * 'required_without' | 'min' | 'max' | 'invalid'
     */
    public ?string $products = null;
}
