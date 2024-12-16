<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Services;

use SimplePay\ApiClient\Exceptions\HttpException;
use SimplePay\ApiClient\Models\Currency;

final class CurrencyService extends BaseService
{
    /**
     * @return Currency[]
     */
    public function list(): array
    {
        $res = $this->request('GET', '?v=1');

        $status = $res->getStatusCode();

        if ($status !== 200) {
            throw new HttpException('', $status);
        }

        return $this->data(sprintf('array<%s>', Currency::class), $res);
    }
}
