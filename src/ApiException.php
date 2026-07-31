<?php

/*
 * infrawrench/sdk v0.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.19.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk;

/**
 * Thrown for any non-2xx response.
 *
 * Branch on `$e->errorCode` — the API's machine-readable `code` field, e.g.
 * `reauthentication_required` on a step-up 403 — rather than on the message,
 * which is prose and may be reworded.
 *
 * The property is `errorCode` and not `code` because `\Exception` already
 * declares a `code` and PHP will not let a subclass redeclare an inherited
 * property as readonly. `getCode()` returns the HTTP status.
 */
class ApiException extends \RuntimeException
{
    /** HTTP status of the failed response. */
    public readonly int $status;

    /** The API's `code` discriminator, when the response carried one. */
    public readonly ?string $errorCode;

    /** Decoded response body — an array for JSON, the raw string otherwise. */
    public readonly mixed $body;

    /** HTTP method of the request that failed. */
    public readonly string $method;

    /** Fully resolved URL of the request that failed. */
    public readonly string $url;

    public function __construct(
        string $message,
        int $status,
        mixed $body = null,
        ?string $errorCode = null,
        string $method = '',
        string $url = '',
    ) {
        parent::__construct($message, $status);
        $this->status = $status;
        $this->errorCode = $errorCode;
        $this->body = $body;
        $this->method = $method;
        $this->url = $url;
    }
}
