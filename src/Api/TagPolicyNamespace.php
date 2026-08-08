<?php

/*
 * infrawrench/sdk v0.44.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.44.0).
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
use Infrawrench\Sdk\Model\TagComplianceReport;
use Infrawrench\Sdk\Model\TagPolicy;
use Infrawrench\Sdk\RequestOptions;

/** `$client->tagPolicy` */
final class TagPolicyNamespace extends ApiNamespace
{
    /**
     * Per-account tag compliance scores
     *
     * For each account: how many of its resources expose tags and how many of those carry every
     * required tag with an allowed value. `score` is over the evaluated (tag-capable) set so
     * untaggable resource types don't drag it.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/tag-policy/compliance
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function compliance(?string $orgId = null, ?RequestOptions $options = null): TagComplianceReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/tag-policy/compliance',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return TagComplianceReport::fromArray(Coerce::toArray($data));
    }

    /**
     * The org's required-tag policy
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/tag-policy
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): TagPolicy
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/tag-policy',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return TagPolicy::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace the org's tag policy
     *
     * Sets the required tag keys (each optionally restricted to allowed values) and whether
     * resource creation is blocked when they are missing. Keys are matched case-insensitively
     * against the generic `tags`/`labels` field convention.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/tag-policy
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(TagPolicy $body, ?string $orgId = null, ?RequestOptions $options = null): TagPolicy
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/tag-policy',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return TagPolicy::fromArray(Coerce::toArray($data));
    }
}
