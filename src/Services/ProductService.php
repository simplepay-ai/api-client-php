<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Services;

use SimplePay\ApiClient\Exceptions\HttpException;
use SimplePay\ApiClient\Models\Product;

final class ProductService extends BaseService
{
    /**
     * @return Invoice[]
     */
    public function list(string $appId): array
    {
        $res = $this->request('GET', sprintf('?v=1&app_id=%s', $appId));

        $status = $res->getStatusCode();

        if ($status !== 200) {
            throw new HttpException('', $status);
        }

        return $this->data(sprintf('array<%s>', Product::class), $res);
    }

    public function get(string $id): Product
    {
        $res = $this->request('GET', sprintf('/%s?v=1', $id));

        $status = $res->getStatusCode();

        if ($status !== 200) {
            throw new HttpException('', $status);
        }

        return $this->data(Product::class, $res);
    }
}
