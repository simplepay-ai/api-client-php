<?php

declare(strict_types=1);

namespace SimplePay\ApiClient;

use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;
use Psr\Http\Message\ServerRequestInterface;
use SimplePay\ApiClient\Models\WebhookEvent;

final class Webhook
{
    private const SIGNATURE_LENGTH = 64;

    private TreeMapper $mapper;

    public function __construct(
        private string $apiKey
    ) {
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
    }

    public function event(ServerRequestInterface $request): WebhookEvent
    {
        $version = $request->getHeaderLine('X-Version');

        if ($version !== '2') {
            throw new Exception('Invalid version');
        }

        $signature = $request->getHeaderLine('X-Signature');

        if (strlen($signature) !== self::SIGNATURE_LENGTH) {
            throw new Exception('Invalid signature');
        }

        $content = $request->getBody()->getContents();

        $hash = hash_hmac('sha256', $content, $this->apiKey);

        if ($hash !== $signature) {
            throw new Exception('Invalid signature');
        }

        $source = Source::json($content)->camelCaseKeys();

        return $this->mapper->map(WebhookEvent::class, $source);
    }
}
