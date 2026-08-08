<?php

/*
 * infrawrench/sdk v0.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.39.0).
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
use Infrawrench\Sdk\Model\OrphanListResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->orphans` */
final class OrphansNamespace extends ApiNamespace
{
    /**
     * List likely-orphaned and idle resources
     *
     * Scans the organization's already-synced resources against each plugin's declarative orphan
     * heuristics — unattached volumes, unassigned floating/elastic IPs, reserved-but-unused static
     * IPs — and returns the matches grouped by account, each with the plugin's reason. Purely a
     * read over stored state: no provider API calls are made, so results reflect the last sync.
     * Where the org's collected cost data has per-resource rows, matches are annotated with
     * trailing spend.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/orphans
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): OrphanListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/orphans',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return OrphanListResponse::fromArray(Coerce::toArray($data));
    }
}
