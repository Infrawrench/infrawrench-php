<?php

/*
 * infrawrench/sdk v1.74.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.0).
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
use Infrawrench\Sdk\Model\KubernetesNetworkReport;
use Infrawrench\Sdk\RequestOptions;

/** `$client->networkFlows->kubernetes` */
final class NetworkFlowsKubernetesNamespace extends ApiNamespace
{
    /** `$client->networkFlows->kubernetes->settings` */
    public readonly NetworkFlowsKubernetesSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new NetworkFlowsKubernetesSettingsNamespace($this->transport);
    }

    /**
     * Kubernetes network costs for one cluster
     *
     * Pod-level network attribution for a Kubernetes account: bytes by namespace, workload and
     * boundary (same zone, cross-zone, cross-region, internet), the largest workload → peer pairs,
     * and which sources the figures came from.
     *
     * `estimatedCost` is bytes at the published rate of the cloud the nodes run on, with any
     * per-cluster overrides from the account's rates field. When a billed source is configured
     * (`PUT .../settings`), `allocatedCost` apportions that real billed spend across the rows day
     * by day, never handing out more than was billed; the rest is `unallocatedCost`.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/network-flows/kubernetes/{accountId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Inclusive start day. Defaults to 13 days ago.
     * @param string|null $to Inclusive end day. Defaults to today.
     * @param int|null $limit Pairs to return in `topTalkers`. Defaults to 25.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $accountId, ?string $orgId = null, ?string $from = null, ?string $to = null, ?int $limit = null, ?RequestOptions $options = null): KubernetesNetworkReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/network-flows/kubernetes/{accountId}',
                pathParams: ['orgId' => $orgId, 'accountId' => $accountId],
                query: ['from' => $from, 'to' => $to, 'limit' => $limit],
            ),
            $options,
        );

        return KubernetesNetworkReport::fromArray(Coerce::toArray($data));
    }
}
