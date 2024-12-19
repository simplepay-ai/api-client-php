<?php

declare(strict_types=1);

namespace SimplePay\ApiClient;

use SimplePay\ApiClient\UrlServices\InvoiceService;

final class Url
{
    public InvoiceService $invoice;

    public function __construct(
        private string $baseHostname = 'simplepay.ai'
    ) {
        $this->invoice = new InvoiceService($baseHostname);
    }
}
