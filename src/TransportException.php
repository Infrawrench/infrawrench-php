<?php

/*
 * infrawrench/sdk v0.1.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.1.1).
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
 * The request never produced a usable response: DNS failure, connection reset,
 * TLS error, timeout, or a 2xx whose body claimed to be JSON and was not.
 *
 * Kept distinct from {@see ApiException} because the two want different
 * handling — this one is worth retrying, an `ApiException` usually is not.
 */
class TransportException extends \RuntimeException
{
}
