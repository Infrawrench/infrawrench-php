<?php

/*
 * infrawrench/sdk v0.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.18.0).
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
use Infrawrench\Sdk\Model\CreateOrgRequest;
use Infrawrench\Sdk\Model\Organization;
use Infrawrench\Sdk\RequestOptions;

/** `$client->orgs` */
final class OrgsNamespace extends ApiNamespace
{
    /**
     * Create a new organization
     *
     * The caller becomes the `owner` of the new organization.
     *
     * POST /api/orgs
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CreateOrgRequest $body, ?RequestOptions $options = null): Organization
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/orgs',
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Organization::fromArray(Coerce::toArray($data));
    }
}
