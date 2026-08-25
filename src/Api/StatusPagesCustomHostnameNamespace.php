<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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
use Infrawrench\Sdk\Model\StatusPage;
use Infrawrench\Sdk\Model\StatusPageCustomHostnameAttach;
use Infrawrench\Sdk\RequestOptions;

/** `$client->statusPages->customHostname` */
final class StatusPagesCustomHostnameNamespace extends ApiNamespace
{
    /**
     * Attach a custom domain
     *
     * Creates a Cloudflare Custom Hostname for a subdomain and returns the DNS records the
     * customer must add. Paid plan only. Apex domains are rejected. At most one hostname per page.
     *
     * POST /api/org/{orgId}/status-pages/{id}/custom-hostname
     *
     * Raises on 400: Bad request
     *
     * Raises on 402: Payment required — the organization's plan does not include this
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $id, ?string $orgId = null, ?StatusPageCustomHostnameAttach $body = null, ?RequestOptions $options = null): StatusPage
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/status-pages/{id}/custom-hostname',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return StatusPage::fromArray(Coerce::toArray($data));
    }

    /**
     * Detach a custom domain
     *
     * Removes the Cloudflare Custom Hostname and the edge hostname→slug mapping. The secret slug
     * URL is unaffected.
     *
     * DELETE /api/org/{orgId}/status-pages/{id}/custom-hostname
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): StatusPage
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/status-pages/{id}/custom-hostname',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return StatusPage::fromArray(Coerce::toArray($data));
    }

    /**
     * Refresh custom domain status
     *
     * Re-fetches Cloudflare hostname and certificate status and updates the page record.
     *
     * POST /api/org/{orgId}/status-pages/{id}/custom-hostname/refresh
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function refresh(string $id, ?string $orgId = null, ?RequestOptions $options = null): StatusPage
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/status-pages/{id}/custom-hostname/refresh',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return StatusPage::fromArray(Coerce::toArray($data));
    }
}
