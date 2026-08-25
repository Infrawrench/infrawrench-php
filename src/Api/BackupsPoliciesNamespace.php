<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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
use Infrawrench\Sdk\Model\BackupPolicy;
use Infrawrench\Sdk\Model\BackupPolicyCreate;
use Infrawrench\Sdk\Model\BackupPolicyList;
use Infrawrench\Sdk\Model\BackupPolicyUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->backups->policies` */
final class BackupsPoliciesNamespace extends ApiNamespace
{
    /**
     * Create a backup policy
     *
     * A policy must demand at least one of `maxRpoHours` and `minRetentionDays` — one that demands
     * nothing could never produce a finding and would read as protection while providing none. An
     * empty `resourceTypeIds` selects every stateful resource type.
     *
     * POST /api/org/{orgId}/backups/policies
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?BackupPolicyCreate $body = null, ?RequestOptions $options = null): BackupPolicy
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/backups/policies',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return BackupPolicy::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a backup policy
     *
     * Removes the objective. To stop a policy judging without losing it, set `enabled` to false
     * instead.
     *
     * DELETE /api/org/{orgId}/backups/policies/{policyId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $policyId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/backups/policies/{policyId}',
                pathParams: ['orgId' => $orgId, 'policyId' => $policyId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List the organization's backup policies
     *
     * The recovery objectives coverage is judged against. A policy selects resources by type
     * and/or tag and demands a maximum RPO, a minimum retention, or both.
     *
     * GET /api/org/{orgId}/backups/policies
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): BackupPolicyList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/backups/policies',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return BackupPolicyList::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a backup policy
     *
     * Omitted fields are left alone; an explicit `null` clears `tagKey`, `tagValue`, `maxRpoHours`
     * or `minRetentionDays`. The result is validated after merging, so a patch that would leave
     * the policy demanding nothing is rejected.
     *
     * PATCH /api/org/{orgId}/backups/policies/{policyId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $policyId, ?string $orgId = null, ?BackupPolicyUpdate $body = null, ?RequestOptions $options = null): BackupPolicy
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/backups/policies/{policyId}',
                pathParams: ['orgId' => $orgId, 'policyId' => $policyId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return BackupPolicy::fromArray(Coerce::toArray($data));
    }
}
