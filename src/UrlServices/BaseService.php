<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\UrlServices;

abstract class BaseService
{
    public function __construct(
        protected string $baseHostname
    ) {
    }
}
