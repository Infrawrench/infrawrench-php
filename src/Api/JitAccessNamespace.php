<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

/** `$client->jitAccess` */
final class JitAccessNamespace extends ApiNamespace
{
    /** `$client->jitAccess->accounts` */
    public readonly JitAccessAccountsNamespace $accounts;

    /** `$client->jitAccess->policies` */
    public readonly JitAccessPoliciesNamespace $policies;

    /** `$client->jitAccess->requests` */
    public readonly JitAccessRequestsNamespace $requests;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->accounts = new JitAccessAccountsNamespace($this->transport);
        $this->policies = new JitAccessPoliciesNamespace($this->transport);
        $this->requests = new JitAccessRequestsNamespace($this->transport);
    }
}
