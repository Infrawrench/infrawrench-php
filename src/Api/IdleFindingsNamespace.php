<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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
use Infrawrench\Sdk\Model\IdleFindingsOverview;
use Infrawrench\Sdk\RequestOptions;

/** `$client->idleFindings` */
final class IdleFindingsNamespace extends ApiNamespace
{
    /** `$client->idleFindings->settings` */
    public readonly IdleFindingsSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new IdleFindingsSettingsNamespace($this->transport);
    }

    /**
     * Idle rules, their settings and collection status
     *
     * Every metric-based idle rule the loaded plugins declare (idle NAT gateways, load balancers,
     * caches, provisioned tables, clusters, unused custom metrics), with the organization's
     * effective thresholds, plus each account's last collection and error. The findings themselves
     * are rows of `GET /orphans` with `idle` set.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/idle-findings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): IdleFindingsOverview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/idle-findings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return IdleFindingsOverview::fromArray(Coerce::toArray($data));
    }

    /**
     * Re-scan idle rules now
     *
     * Makes every account due for an idle collection on the next poller tick. The reads are billed
     * to the organization's own cloud accounts (CloudWatch GetMetricData and the like).
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/idle-findings/rescan
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{ok: bool}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rescan(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/idle-findings/rescan',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
