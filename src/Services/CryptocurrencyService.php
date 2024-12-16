<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Services;

use SimplePay\ApiClient\Exceptions\HttpException;
use SimplePay\ApiClient\Exceptions\ValidationException;
use SimplePay\ApiClient\Models\Cryptocurrency;
use SimplePay\ApiClient\Requests\CryptocurrencyListRequest;
use SimplePay\ApiClient\Responses\CryptocurrencyListErrorsResponse;

final class CryptocurrencyService extends BaseService
{
    /**
     * @return Cryptocurrency[]
     */
    public function list(?CryptocurrencyListRequest $request = null): array
    {
        $res = $this->request('GET', sprintf('?v=1&%s', $this->query($request)));

        $status = $res->getStatusCode();

        if ($status !== 200 && $status !== 400) {
            throw new HttpException('', $status);
        }

        if ($status === 400) {
            $errors = $this->data(CryptocurrencyListErrorsResponse::class, $res);

            throw new ValidationException($errors);
        }

        return $this->data(sprintf('array<%s>', Cryptocurrency::class), $res);
    }
}
