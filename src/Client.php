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
    private const API_BASE = 'https://api.simplepay.ai';

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
    ) {
        $this->app = new AppService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', self::API_BASE, '/app')
        );
        $this->cryptocurrency = new CryptocurrencyService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', self::API_BASE, '/cryptocurrency')
        );
        $this->currency = new CurrencyService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', self::API_BASE, '/currency')
        );
        $this->invoice = new InvoiceService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', self::API_BASE, '/invoice')
        );
        $this->product = new ProductService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', self::API_BASE, '/product')
        );
        $this->transaction = new TransactionService(
            $client,
            $requestFactory,
            $streamFactory,
            sprintf('%s%s', self::API_BASE, '/transaction')
        );
    }
}
