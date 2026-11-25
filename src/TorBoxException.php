<?php

declare(strict_types=1);

namespace TorBox\Sdk;

final class TorBoxException extends \RuntimeException
{
    public readonly ?string $error;

    public function __construct(
        public readonly int $status,
        mixed $error,
        mixed $detail,
        string $fallback,
        ?\Throwable $previous = null
    ) {
        $this->error = is_string($error) ? $error : null;
        parent::__construct(is_string($detail) ? $detail : $fallback, $status, $previous);
    }
}
