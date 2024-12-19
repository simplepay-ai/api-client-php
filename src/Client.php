<?php

declare(strict_types=1);

namespace SimplePay\ApiClient;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use SimplePay\ApiClient\Services\AppService;
use SimplePay\ApiClient\Services\CryptocurrencyService;
use SimplePay\ApiClient\Services\CurrencyService;
use SimplePay\ApiClient\Services\InvoiceService;
use SimplePay\ApiClient\Services\ProductService;
use SimplePay\ApiClient\Services\TransactionService;

final class Client
{
    public AppService $app;
    public CryptocurrencyService $cryptocurrency;
    public CurrencyService $currency;
    public InvoiceService $invoice;
    public ProductService $product;
    public TransactionService $transaction;

    public function __construct(
        private ClientInterface $client,
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
        private ?string $apiKey = null,
        private ?string $apiBase = 'https://api.simplepay.ai'
    ) {
        $this->app = new AppService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', $this->apiBase, '/app'),
            $apiKey
        );
        $this->cryptocurrency = new CryptocurrencyService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', $this->apiBase, '/cryptocurrency'),
            $apiKey
        );
        $this->currency = new CurrencyService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', $this->apiBase, '/currency'),
            $apiKey
        );
        $this->invoice = new InvoiceService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', $this->apiBase, '/invoice'),
            $apiKey
        );
        $this->product = new ProductService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', $this->apiBase, '/product'),
            $apiKey
        );
        $this->transaction = new TransactionService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', $this->apiBase, '/transaction'),
            $apiKey
        );
    }
}
