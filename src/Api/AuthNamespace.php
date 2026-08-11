<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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
use Infrawrench\Sdk\Internal\Coerce;
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\Model\OrgMembership;
use Infrawrench\Sdk\Model\Session;
use Infrawrench\Sdk\RequestOptions;

/** `$client->auth` */
final class AuthNamespace extends ApiNamespace
{
    /**
     * Current session + onboarding status
     *
     * GET /api/auth/me
     *
     * Raises on 401: Unauthenticated
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function me(?RequestOptions $options = null): Session
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/auth/me',
            ),
            $options,
        );

        return Session::fromArray(Coerce::toArray($data));
    }

    /**
     * Organizations the current user belongs to
     *
     * GET /api/auth/orgs
     *
     * Raises on 401: Unauthenticated
     *
     * @return list<OrgMembership>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function orgs(?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/auth/orgs',
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): OrgMembership => OrgMembership::fromArray(Coerce::toArray($item)));
    }
}
