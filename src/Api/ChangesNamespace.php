<?php

/*
 * infrawrench/sdk v0.32.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.32.0).
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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\ResourceChangeFeedResponse;
use Infrawrench\Sdk\Model\ResourceChangeKind;
use Infrawrench\Sdk\Model\ResourceChangeListResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->changes` */
final class ChangesNamespace extends ApiNamespace
{
    /** `$client->changes->alertSettings` */
    public readonly ChangesAlertSettingsNamespace $alertSettings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->alertSettings = new ChangesAlertSettingsNamespace($this->transport);
    }

    /**
     * Org-wide change timeline (paginated, filterable)
     *
     * Change events recorded by the resource poller: each poll cycle diffs the freshly fetched
     * state against the stored snapshot and records resources that appeared, changed a stored
     * field, or disappeared upstream. Cross-provider by construction — the diff runs on the
     * generic stored record, so every plugin's resources show up here.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/changes
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param ResourceChangeKind::*|null $kind
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?int $page = null, ?int $pageSize = null, ?string $accountId = null, ?string $resourceId = null, ?string $kind = null, ?string $from = null, ?string $to = null, ?RequestOptions $options = null): ResourceChangeFeedResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/changes',
                pathParams: ['orgId' => $orgId],
                query: ['page' => $page, 'pageSize' => $pageSize, 'accountId' => $accountId, 'resourceId' => $resourceId, 'kind' => $kind, 'from' => $from, 'to' => $to],
            ),
            $options,
        );

        return ResourceChangeFeedResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Change timeline for one resource
     *
     * Recent change events for a single resource, newest first. The resource id travels as a query
     * parameter because composite ids contain slashes and colons.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/changes/resource
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function resource(string $resourceId, ?string $orgId = null, ?int $limit = null, ?RequestOptions $options = null): ResourceChangeListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/changes/resource',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId, 'limit' => $limit],
            ),
            $options,
        );

        return ResourceChangeListResponse::fromArray(Coerce::toArray($data));
    }
}
