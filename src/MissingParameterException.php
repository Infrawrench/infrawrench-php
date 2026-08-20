<?php

/*
 * infrawrench/sdk v1.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.34.0).
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
 * A URL placeholder had nothing to fill it with.
 *
 * In practice this is always `orgId`: it is optional at the call site
 * because the client can supply it, so forgetting both the constructor argument
 * and the per-call argument is a mistake PHP's own signature checking cannot
 * catch. Raised before any network call, and it names the parameter and the
 * route so the fix is obvious from the message alone.
 */
class MissingParameterException extends \InvalidArgumentException
{
    /** Name of the placeholder that could not be resolved. */
    public readonly string $parameter;

    public function __construct(string $message, string $parameter)
    {
        parent::__construct($message);
        $this->parameter = $parameter;
    }
}
