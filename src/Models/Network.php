<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Models;

final class Network
{
    /**
     * Network ID
     */
    public string $id;

    /**
     * Network symbol
     */
    public string $symbol;

    /**
     * Network name
     */
    public string $name;

    /**
     * Network type
     */
    public string $type;
}
