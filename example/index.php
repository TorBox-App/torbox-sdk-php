<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use TorboxApi\Models;

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->general->getUpStatus();

print_r($response);
