<?php

declare(strict_types=1);

namespace SimplePay\ApiClient;

final class Url
{
    public function __construct(
        private string $baseHostname = 'simplepay.ai'
    ) {
    }
}
