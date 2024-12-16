<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Services;

use SimplePay\ApiClient\Exceptions\HttpException;
use SimplePay\ApiClient\Exceptions\ValidationException;
use SimplePay\ApiClient\Models\Invoice;
use SimplePay\ApiClient\Requests\InvoiceCreateRequest;
use SimplePay\ApiClient\Requests\InvoiceListRequest;
use SimplePay\ApiClient\Responses\InvoiceCreateErrorsResponse;
use SimplePay\ApiClient\Responses\InvoiceListErrorsResponse;

final class InvoiceService extends BaseService
{
    public function create(InvoiceCreateRequest $request): Invoice
    {
        $res = $this->request('POST', '?v=2', $request);

        $status = $res->getStatusCode();

        if ($status !== 201 && $status !== 400) {
            throw new HttpException('', $status);
        }

        if ($status === 400) {
            $errors = $this->data(InvoiceCreateErrorsResponse::class, $res);

            throw new ValidationException($errors);
        }

        return $this->data(Invoice::class, $res);
    }

    public function get(string $id, bool $app = false): Invoice
    {
        $res = $this->request('GET', sprintf('/%s?v=2&app=%s', $id, $app));

        $status = $res->getStatusCode();

        if ($status !== 200) {
            throw new HttpException('', $status);
        }

        return $this->data(Invoice::class, $res);
    }

    public function cancel(string $id): Invoice
    {
        $res = $this->request('DELETE', sprintf('/%s?v=2', $id));

        $status = $res->getStatusCode();

        if ($status !== 200) {
            throw new HttpException('', $status);
        }

        return $this->data(Invoice::class, $res);
    }

    /**
     * @return Invoice[]
     */
    public function list(?InvoiceListRequest $request): array
    {
        $res = $this->request('GET', sprintf('?v=2&%s', $this->query($request)));

        $status = $res->getStatusCode();

        if ($status !== 200 && $status !== 400) {
            throw new HttpException('', $status);
        }

        if ($status === 400) {
            $errors = $this->data(InvoiceListErrorsResponse::class, $res);

            throw new ValidationException($errors);
        }

        return $this->data(sprintf('array<%s>', Invoice::class), $res);
    }
}
