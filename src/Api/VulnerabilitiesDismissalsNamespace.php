<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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
use Infrawrench\Sdk\Model\VulnerabilityDismissal;
use Infrawrench\Sdk\Model\VulnerabilityDismissalCreate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->vulnerabilities->dismissals` */
final class VulnerabilitiesDismissalsNamespace extends ApiNamespace
{
    /**
     * Dismiss a vulnerability
     *
     * Accept an advisory as a known risk for one artifact (keyed on the image repository, so it
     * survives rebuilds) or, with `artifactKey: "*"`, everywhere. Idempotent.
     *
     * POST /api/org/{orgId}/vulnerabilities/dismissals
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?VulnerabilityDismissalCreate $body = null, ?RequestOptions $options = null): VulnerabilityDismissal
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/vulnerabilities/dismissals',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return VulnerabilityDismissal::fromArray(Coerce::toArray($data));
    }

    /**
     * Restore a dismissed vulnerability
     *
     * The key is in the query string because artifact keys contain slashes.
     *
     * DELETE /api/org/{orgId}/vulnerabilities/dismissals
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $advisoryId, string $artifactKey, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/vulnerabilities/dismissals',
                pathParams: ['orgId' => $orgId],
                query: ['advisoryId' => $advisoryId, 'artifactKey' => $artifactKey],
                accept: 'empty',
            ),
            $options,
        );
    }
}
