<?php

declare(strict_types=1);

namespace TorBox\Sdk;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

final class TorBox
{
    private readonly Configuration $config;
    private readonly ClientInterface $http;

    public function __construct(
        string $apiKey,
        string $baseUrl = 'https://api.torbox.app',
        float $timeout = 30.0,
        ?ClientInterface $http = null
    ) {
        $this->config = (new Configuration())
            ->setHost(rtrim($baseUrl, '/'))
            ->setAccessToken($apiKey)
            ->setUserAgent('torbox-php/9.3.1-beta20261125.4');
        $this->http = $http ?? new Client(['timeout' => $timeout]);
    }

    /**
     * @template T of object
     * @param class-string<T> $api
     * @return T
     */
    public function api(string $api): object
    {
        return new $api($this->http, $this->config);
    }

    /** Send a generated request and unwrap its TorBox response envelope. */
    public function send(callable $request): mixed
    {
        try {
            $response = $request();
        } catch (ApiException $exception) {
            $body = $exception->getResponseBody();
            $payload = is_string($body) ? json_decode($body, true) : (array) $body;
            throw new TorBoxException(
                $exception->getCode(),
                $payload['error'] ?? null,
                $payload['detail'] ?? null,
                $exception->getMessage(),
                $exception
            );
        }

        if (is_object($response) && method_exists($response, 'getSuccess') && method_exists($response, 'getData')) {
            if ($response->getSuccess() === false) {
                throw new TorBoxException(200, $response->getError(), $response->getDetail(), 'TorBox request failed');
            }
            return $response->getData();
        }

        if ($response instanceof \stdClass && property_exists($response, 'success')) {
            if ($response->success === false) {
                throw new TorBoxException(200, $response->error ?? null, $response->detail ?? null, 'TorBox request failed');
            }
            return $response->data ?? null;
        }

        return $response;
    }
}
