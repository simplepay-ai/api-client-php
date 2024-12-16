<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Models;

final class App
{
    /**
     * App ID
     */
    public string $id;

    /**
     * App name
     */
    public string $name;

    /**
     * App description
     */
    public ?string $description = null;

    /**
     * App image
     */
    public ?string $image = null;

    /**
     * App slug
     */
    public ?string $slug = null;

    /**
     * App URL
     *
     * @format URL
     */
    public string $url;
}
