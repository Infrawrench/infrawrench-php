<?php

/*
 * infrawrench/sdk v1.0.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.0.0).
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
use Infrawrench\Sdk\Model\DnsInventoryResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->dns` */
final class DnsNamespace extends ApiNamespace
{
    /**
     * List every DNS zone and record, with dangling targets flagged
     *
     * One view over every zone and record across the connected DNS providers (Cloudflare, Route
     * 53, Cloud DNS, DigitalOcean, Netlify, Azure DNS, Vercel), with each record target classified
     * against the rest of the workspace. No provider API calls are made and no DNS is resolved —
     * results reflect the last sync.
     *
     * A `dangling` target is a subdomain-takeover candidate: the record points into a provider
     * namespace this workspace manages and nothing synced claims it. The same records surface as
     * `dns-dangling-target` findings on `GET /posture` and alert through the posture channel, so
     * there is no separate DNS alert setting.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/dns
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): DnsInventoryResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dns',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return DnsInventoryResponse::fromArray(Coerce::toArray($data));
    }
}
