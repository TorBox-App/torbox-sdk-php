# TorBox PHP SDK

Requires PHP 8.1 or later and Composer.

```bash
composer require "torbox/sdk:9.3.2026112508"
```

## Quick start

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use TorBox\Sdk\Api\UserApi;
use TorBox\Sdk\TorBox;

$torbox = new TorBox(getenv('TORBOX_API_KEY'));
$me = $torbox->send(fn () => $torbox->api(UserApi::class)->getUserData());
echo $me->getEmail();
```

Use `api()` to access the generated classes in `TorBox\Sdk\Api`. `send()` unwraps successful responses and
throws `TorBoxException` with the HTTP status and TorBox error code for API failures. List methods take the
query parameters documented in the reference.
Pass your API key as the `token` query argument for download links. [TorBox API reference](https://api-docs.torbox.app/reference)
