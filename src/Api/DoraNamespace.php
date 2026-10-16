<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
use Infrawrench\Sdk\Model\DoraChangeList;
use Infrawrench\Sdk\Model\DoraDeploymentInput;
use Infrawrench\Sdk\Model\DoraDeploymentRecorded;
use Infrawrench\Sdk\Model\DoraReport;
use Infrawrench\Sdk\Model\DoraRestoreList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->dora` */
final class DoraNamespace extends ApiNamespace
{
    /** `$client->dora->settings` */
    public readonly DoraSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new DoraSettingsNamespace($this->transport);
    }

    /**
     * List production changes
     *
     * The drill-down: every production change in the window with its lead time and, when it
     * failed, what it was blamed for. Newest first, at most 500.
     *
     * _Requires permission: `deployments:read`._
     *
     * GET /api/org/{orgId}/dora/changes
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Start (inclusive). Defaults to 30 days before `to`.
     * @param string|null $to End (exclusive). Defaults to now. At most 366 days after `from`.
     * @param string|null $dimension Filter to one scope of this dimension.
     * @param string|null $value The scope key to filter to. Omit it with `dimension` for changes where it is not known.
     * @param 'true'|'false'|null $failedOnly
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function changes(?string $orgId = null, ?string $from = null, ?string $to = null, ?string $dimension = null, ?string $value = null, ?string $failedOnly = null, ?RequestOptions $options = null): DoraChangeList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dora/changes',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to, 'dimension' => $dimension, 'value' => $value, 'failedOnly' => $failedOnly],
            ),
            $options,
        );

        return DoraChangeList::fromArray(Coerce::toArray($data));
    }

    /**
     * Record a deploy
     *
     * For a CI or deploy tool no plugin covers: one call per deploy, from the pipeline's last
     * step. Idempotent on `externalId`, so a retried step updates rather than duplicates.
     * Audit-logged.
     *
     * _Requires permission: `deployments:write`._
     *
     * POST /api/org/{orgId}/dora/deployments
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function deployments(?string $orgId = null, ?DoraDeploymentInput $body = null, ?RequestOptions $options = null): DoraDeploymentRecorded
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dora/deployments',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return DoraDeploymentRecorded::fromArray(Coerce::toArray($data));
    }

    /**
     * DORA metrics
     *
     * Deployment frequency, lead time for changes, change failure rate and time to restore over
     * production, from Infrafile runs, synced provider deploys, GitHub deployments, recorded
     * deploys and declared incidents. With the previous period, a trend, and a breakdown.
     *
     * _Requires permission: `deployments:read`._
     *
     * GET /api/org/{orgId}/dora
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Start (inclusive). Defaults to 30 days before `to`.
     * @param string|null $to End (exclusive). Defaults to now. At most 366 days after `from`.
     * @param string|null $dimension Filter to one scope of this dimension.
     * @param string|null $value The scope key to filter to. Omit it with `dimension` for changes where it is not known.
     * @param 'day'|'week'|null $bucket Trend bucket; weeks past 45 days.
     * @param string|null $groupBy Breakdown dimension; defaults to `environment`.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $from = null, ?string $to = null, ?string $dimension = null, ?string $value = null, ?string $bucket = null, ?string $groupBy = null, ?RequestOptions $options = null): DoraReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dora',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to, 'dimension' => $dimension, 'value' => $value, 'bucket' => $bucket, 'groupBy' => $groupBy],
            ),
            $options,
        );

        return DoraReport::fromArray(Coerce::toArray($data));
    }

    /**
     * List recoveries
     *
     * Declared incidents resolved and bad deploys rolled back in the window, newest first, at most
     * 500.
     *
     * _Requires permission: `deployments:read`._
     *
     * GET /api/org/{orgId}/dora/restores
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Start (inclusive). Defaults to 30 days before `to`.
     * @param string|null $to End (exclusive). Defaults to now. At most 366 days after `from`.
     * @param string|null $dimension Filter to one scope of this dimension.
     * @param string|null $value The scope key to filter to. Omit it with `dimension` for changes where it is not known.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function restores(?string $orgId = null, ?string $from = null, ?string $to = null, ?string $dimension = null, ?string $value = null, ?RequestOptions $options = null): DoraRestoreList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dora/restores',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to, 'dimension' => $dimension, 'value' => $value],
            ),
            $options,
        );

        return DoraRestoreList::fromArray(Coerce::toArray($data));
    }
}
