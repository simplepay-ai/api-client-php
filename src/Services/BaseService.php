<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Services;

use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;
use CuyZ\Valinor\Normalizer\Format;
use CuyZ\Valinor\Normalizer\Normalizer;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use SimplePay\ApiClient\Helpers\CamelToSnakeCaseTransformer;

abstract class BaseService
{
    private const CSRF_TOKEN_HEADER = 'X-Csrf-Token';

    private TreeMapper $mapper;
    private Normalizer $arrayNormalizer;
    private Normalizer $jsonNormalizer;
    private ?string $csrfToken = null;

    public function __construct(
        private ClientInterface $client,
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
        private string $apiBase,
        private ?string $apiKey = null
    )
    {
        $this->mapper = (new MapperBuilder())
            ->supportDateFormats(
                DATE_RFC3339,
                DATE_RFC3339_EXTENDED,
                'Y-m-d\TH:i:s.uP',
                'Y-m-d\TH:i:s.uuP'
            )
            ->enableFlexibleCasting()
            ->allowSuperfluousKeys()
            ->allowPermissiveTypes()
            ->mapper();

        $this->arrayNormalizer = (new MapperBuilder())
            ->registerTransformer(new CamelToSnakeCaseTransformer())
            ->normalizer(Format::array());

        $this->jsonNormalizer = (new MapperBuilder())
            ->registerTransformer(new CamelToSnakeCaseTransformer())
            ->normalizer(Format::json());
    }

    public function request(string $method, string $path, mixed $body = null): ResponseInterface
    {
        $uri = sprintf('%s%s', $this->apiBase, $path);

        $request = $this->requestFactory->createRequest($method, $uri);

        if ($this->csrfToken !== null) {
            $request = $request->withHeader(self::CSRF_TOKEN_HEADER, $this->csrfToken);
        }

        if ($this->apiKey !== null) {
            $request = $request->withHeader('Authorization', sprintf('Bearer %s', $this->apiKey));
        }

        if ($body !== null) {
            $json = $this->jsonNormalizer->normalize($body);

            $stream = $this->streamFactory->createStream($json);

            $request = $request
                ->withHeader('Content-Type', 'application/json')
                ->withBody($stream);
        }

        $response = $this->client->sendRequest($request);

        if ($response->hasHeader(self::CSRF_TOKEN_HEADER)) {
            $this->csrfToken = $response->getHeaderLine(self::CSRF_TOKEN_HEADER);
        }

        return $response;
    }

    public function query(mixed $value): string
    {
        if ($value === null) {
            return '';
        }

        return http_build_query($this->arrayNormalizer->normalize($value));
    }

    public function data(string $signature, ResponseInterface $response): mixed
    {
        $content = $response->getBody()->getContents();

        $source = Source::json($content)->camelCaseKeys();

        return $this->mapper->map($signature, $source);
    }
}
