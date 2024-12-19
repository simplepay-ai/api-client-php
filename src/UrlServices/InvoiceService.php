<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\UrlServices;

use SimplePay\ApiClient\Models\Invoice;

final class InvoiceService extends BaseService
{
    public function pay(Invoice $invoice, ?string $returnTo = null): string
    {
        return $this->payById($invoice->id, $returnTo);
    }

    public function payById(string $invoiceId, ?string $returnTo = null): string
    {
        $url = sprintf('https://pay.%s/invoice/%s', $this->baseHostname, $invoiceId);

        $query = [];

        if ($returnTo !== null) {
            $query['return_to'] = $returnTo;
        }

        if (count($query) > 0) {
            $url .= '?' . http_build_query($query);
        }

        return $url;
    }
}
