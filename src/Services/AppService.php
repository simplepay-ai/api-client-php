<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Services;

use SimplePay\ApiClient\Models\App;

final class AppService extends BaseService
{
    public function get(string $appId): App
    {
        $res = $this->request('GET', sprintf('/%s?v=1', $appId));

        return $this->data(App::class, $res);
    }
}
