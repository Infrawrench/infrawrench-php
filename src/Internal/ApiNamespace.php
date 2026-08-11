<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Internal;

/**
 * Base class for every generated namespace — `$client->accounts`,
 * `$client->accounts->credentials`, and so on.
 *
 * It exists only to hold the transport, so the generated classes are nothing
 * but their child namespaces and their calls.
 */
abstract class ApiNamespace
{
    public function __construct(protected readonly Transport $transport)
    {
    }
}
