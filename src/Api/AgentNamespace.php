<?php

/*
 * infrawrench/sdk v1.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.28.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Api;

use Infrawrench\Sdk\Internal\ApiNamespace;
use Infrawrench\Sdk\Internal\Transport;

/** `$client->agent` */
final class AgentNamespace extends ApiNamespace
{
    /** `$client->agent->claim` */
    public readonly AgentClaimNamespace $claim;

    /** `$client->agent->identity` */
    public readonly AgentIdentityNamespace $identity;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->claim = new AgentClaimNamespace($this->transport);
        $this->identity = new AgentIdentityNamespace($this->transport);
    }
}
