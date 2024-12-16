<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Helpers;

final class CamelToSnakeCaseTransformer
{
    public function __invoke(object $object, callable $next): mixed
    {
        $result = $next();

        if (! is_array($result)) {
            return $result;
        }

        $snakeCased = [];

        foreach ($result as $key => $value) {
            $newKey = strtolower(preg_replace('/[A-Z]/', '_$0', lcfirst($key)));

            $snakeCased[$newKey] = $value;
        }

        return $snakeCased;
    }
}
