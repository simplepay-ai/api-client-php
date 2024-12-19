<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\UrlServices;

use SimplePay\ApiClient\Models\Invoice;

final class InvoiceService extends BaseService
{
    public function pay(Invoice $invoice): string
    {
        return $this->payById($invoice->id);
    }

    public function payById(string $invoiceId): string
    {
        return sprintf('https://pay.%s/invoice/%s', $this->baseHostname, $invoiceId);
    }
}
