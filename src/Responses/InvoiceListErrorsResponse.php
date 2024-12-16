<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Responses;

final class InvoiceListErrorsResponse
{
    /**
     * 'required' | 'uuid4'
     */
    public ?string $appId = null;

    /**
     * 'oneof'
     */
    public ?string $status = null;

    /**
     * 'ascii' | 'max'
     */
    public ?string $clientId = null;
};

