<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use TorBox\Sdk\Api\UserApi;
use TorBox\Sdk\Model\GetUserDataResponseData;
use TorBox\Sdk\TorBox;
use TorBox\Sdk\TorBoxException;

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$failure = '{"success":false,"error":"AUTH_ERROR","detail":"Invalid API key","data":null}';
$headers = ['Content-Type' => 'application/json'];
$history = [];
$handler = HandlerStack::create(new MockHandler([
    new Response(200, $headers, '{"success":true,"error":null,"detail":"OK","data":{"email":"fixture@example.test"}}'),
    new Response(401, $headers, $failure),
    new Response(200, $headers, $failure),
]));
$handler->push(Middleware::history($history));

$torbox = new TorBox('php-sdk-fixture', http: new Client(['handler' => $handler]));
$user = $torbox->api(UserApi::class);
$me = $torbox->send(fn () => $user->getUserData());
check($me instanceof GetUserDataResponseData, 'User data is a typed model');
check($me->getEmail() === 'fixture@example.test', 'The success envelope is unwrapped');
$request = $history[0]['request'];
check($request->getHeaderLine('Authorization') === 'Bearer php-sdk-fixture', 'Bearer token is attached');
check($request->getUri()->getPath() === '/v1/api/user/me', 'The generated method uses the correct path');
parse_str($request->getUri()->getQuery(), $query);
check($query['settings'] === 'false', 'Boolean query parameters use OpenAPI string values');

foreach ([401, 200] as $status) {
    try {
        $torbox->send(fn () => $user->getUserData());
        throw new RuntimeException('Expected a TorBoxException');
    } catch (TorBoxException $exception) {
        check($exception->status === $status, 'The HTTP status is preserved');
        check($exception->error === 'AUTH_ERROR', 'The TorBox error code is preserved');
        check($exception->getMessage() === 'Invalid API key', 'The TorBox error detail is preserved');
    }
}

$mockUrl = getenv('TORBOX_MOCK_URL');
if ($mockUrl) {
    $torbox = new TorBox('php-sdk-fixture', baseUrl: $mockUrl);
    $me = $torbox->send(fn () => $torbox->api(UserApi::class)->getUserData());
    check($me instanceof GetUserDataResponseData, 'The generated client reads the OpenAPI mock response');
}
