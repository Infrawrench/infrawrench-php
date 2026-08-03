<?php

/*
 * infrawrench/sdk v0.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.28.0).
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
 * Per-call overrides. Every generated method accepts one as a trailing
 * `$options` argument, so it can be supplied by name and skipped otherwise.
 */
final class RequestOptions
{
    /**
     * @param array<string, string> $headers Merged over the client-wide headers
     *                                       for this call only.
     * @param float|null            $timeout Seconds to wait, overriding the
     *                                       client-wide timeout. `null` keeps it.
     */
    public function __construct(
        public readonly array $headers = [],
        public readonly ?float $timeout = null,
    ) {
    }
}
