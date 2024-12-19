<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Models;

use SimplePay\ApiClient\Enums\WebhookEventType;

final class WebhookEvent
{
    /**
     * Event type
     */
    public WebhookEventType $type;

    /**
     * Event data
     */
    public mixed $data;
}
