<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Services;

use SimplePay\ApiClient\Exceptions\HttpException;
use SimplePay\ApiClient\Exceptions\ValidationException;
use SimplePay\ApiClient\Models\Transaction;
use SimplePay\ApiClient\Requests\TransactionCreateRequest;
use SimplePay\ApiClient\Requests\TransactionListRequest;
use SimplePay\ApiClient\Responses\TransactionCreateErrorsResponse;

final class TransactionService extends BaseService
{
    public function create(TransactionCreateRequest $request): Transaction
    {
        $res = $this->request('POST', '?v=1', $request);

        $status = $res->getStatusCode();

        if ($status !== 201 && $status !== 400) {
            throw new HttpException('', $status);
        }

        if ($status === 400) {
            $errors = $this->data(TransactionCreateErrorsResponse::class, $res);

            throw new ValidationException($errors);
        }

        return $this->data(Transaction::class, $res);
    }

    public function get(string $id): Transaction
    {
        $res = $this->request('GET', sprintf('/%s?v=1', $id));

        $status = $res->getStatusCode();

        if ($status !== 200) {
            throw new HttpException('', $status);
        }

        return $this->data(Transaction::class, $res);
    }

    public function cancel(string $id): Transaction
    {
        $res = $this->request('DELETE', sprintf('/%s?v=1', $id));

        $status = $res->getStatusCode();

        if ($status !== 200) {
            throw new HttpException('', $status);
        }

        return $this->data(Transaction::class, $res);
    }

    /**
     * @return Transaction[]
     */
    public function list(?TransactionListRequest $request): array
    {
        $res = $this->request('GET', sprintf('?v=1&%s', $this->query($request)));

        $status = $res->getStatusCode();

        if ($status !== 200) {
            throw new HttpException('', $status);
        }

        return $this->data(sprintf('array<%s>', Transaction::class), $res);
    }
}
