<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Enums;

enum InvoiceStatus: string
{
    /**
     * Invoice active
     */
    case Active = 'active';

    /**
     * Invoice closed (without specific reason)
     */
    case Closed = 'closed';

    /**
     * Invoice succeeded
     *
     * Paid service may be granted to end customer on this status
     */
    case Success = 'success';

    /**
     * Invoice canceled
     *
     * By end customer or merchant
     */
    case Canceled = 'canceled';
}
