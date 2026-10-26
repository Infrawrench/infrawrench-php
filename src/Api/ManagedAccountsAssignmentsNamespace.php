<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
use Infrawrench\Sdk\Model\ManagedAccountAssignment;
use Infrawrench\Sdk\Model\ManagedAccountAssignmentPreview;
use Infrawrench\Sdk\Model\ManagedAccountAssignmentPreviewRequest;
use Infrawrench\Sdk\Model\ManagedAccountAssignmentResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->managedAccounts->assignments` */
final class ManagedAccountsAssignmentsNamespace extends ApiNamespace
{
    /**
     * Assign cost centres and accounts to a customer in bulk
     *
     * Takes each item off whichever customer holds it and gives it to `managedAccountId`, or to
     * nobody when that is null, in one transaction. Only drafts change: an approved invoice
     * carries its own copy of its scope.
     *
     * _Requires permission: `invoices:write`._
     *
     * POST /api/org/{orgId}/managed-accounts/assignments
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(ManagedAccountAssignment $body, ?string $orgId = null, ?RequestOptions $options = null): ManagedAccountAssignmentResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/managed-accounts/assignments',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ManagedAccountAssignmentResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Preview a bulk assignment
     *
     * What moving these cost centres and accounts would do: who holds each one today, the spend
     * that moves with it in the period, the totals leaving each customer, and how many draft
     * invoices will change. Nothing is written.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/managed-accounts/assignments/preview
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function preview(ManagedAccountAssignmentPreviewRequest $body, ?string $orgId = null, ?RequestOptions $options = null): ManagedAccountAssignmentPreview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/managed-accounts/assignments/preview',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ManagedAccountAssignmentPreview::fromArray(Coerce::toArray($data));
    }
}
