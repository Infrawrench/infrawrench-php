<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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
use Infrawrench\Sdk\Model\DrillCoverageResponse;
use Infrawrench\Sdk\Model\RestoreDrill;
use Infrawrench\Sdk\Model\RestoreDrillCreate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->backups->drills` */
final class BackupsDrillsNamespace extends ApiNamespace
{
    /**
     * Record a restore drill
     *
     * A `verified` drill **must** carry the measured time: an RPO comes from the backup, and an
     * RTO can only come from somebody with a stopwatch — that number is the entire point of the
     * exercise. A `blocked` drill must not carry one, because it never started.
     *
     * Takes `resources:write`, not a settings permission: recording a drill is reporting what you
     * did, and the person who spent Saturday restoring a database is rarely the person who set the
     * recovery objective.
     *
     * POST /api/org/{orgId}/backups/drills
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?RestoreDrillCreate $body = null, ?RequestOptions $options = null): RestoreDrill
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/backups/drills',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return RestoreDrill::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a recorded drill
     *
     * For one recorded against the wrong resource or the wrong date. Audited — deleting evidence
     * that a restore failed is exactly the edit a reviewer would want to know about.
     *
     * DELETE /api/org/{orgId}/backups/drills/{drillId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $drillId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/backups/drills/{drillId}',
                pathParams: ['orgId' => $orgId, 'drillId' => $drillId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * Where every protected resource stands on restore
     *
     * Backup coverage answers 'is there a backup'. This answers 'does it restore, and how long
     * does it take' — a different question, and the one routinely answered wrongly on the day.
     *
     * A drill is a **record that somebody tried**, not an automated restore: restoring a
     * customer's database unattended costs real money, can collide with production, and cannot be
     * generically verified. What the product can do is make the exercise scheduled, recorded and
     * visible when it lapses.
     *
     * GET /api/org/{orgId}/backups/drills
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param int|null $validDays How long a verified drill counts for. Defaults to 180 days.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?int $validDays = null, ?RequestOptions $options = null): DrillCoverageResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/backups/drills',
                pathParams: ['orgId' => $orgId],
                query: ['validDays' => $validDays],
            ),
            $options,
        );

        return DrillCoverageResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * List recorded restore drills
     *
     * GET /api/org/{orgId}/backups/drills/log
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{drills: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function log(?string $orgId = null, ?string $resourceId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/backups/drills/log',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
