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
use Infrawrench\Sdk\Model\KubernetesEfficiencyOptions;
use Infrawrench\Sdk\Model\KubernetesEfficiencyReport;
use Infrawrench\Sdk\Model\KubernetesEfficiencyReportInput;
use Infrawrench\Sdk\Model\KubernetesEfficiencyResult;
use Infrawrench\Sdk\Model\KubernetesEfficiencyRunResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->k8sEfficiencyReports` */
final class K8sEfficiencyReportsNamespace extends ApiNamespace
{
    /**
     * Create a Kubernetes efficiency report
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/k8s-efficiency-reports
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(KubernetesEfficiencyReportInput $body, ?string $orgId = null, ?RequestOptions $options = null): KubernetesEfficiencyReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/k8s-efficiency-reports',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return KubernetesEfficiencyReport::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a Kubernetes efficiency report
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/k8s-efficiency-reports/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/k8s-efficiency-reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Export a Kubernetes efficiency report
     *
     * One record per row and cost category plus the totals; with `perPeriod`, each row's figures
     * per period as well. CSV (RFC 4180) or newline-delimited JSON.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/k8s-efficiency-reports/{id}/export
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'csv'|'ndjson'|null $format
     * @param 'true'|'false'|'1'|'0'|null $perPeriod
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function export(string $id, ?string $orgId = null, ?string $format = null, ?string $perPeriod = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/k8s-efficiency-reports/{id}/export',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['format' => $format, 'perPeriod' => $perPeriod],
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * Get a Kubernetes efficiency report
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/k8s-efficiency-reports/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): KubernetesEfficiencyReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/k8s-efficiency-reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return KubernetesEfficiencyReport::fromArray(Coerce::toArray($data));
    }

    /**
     * List Kubernetes efficiency reports
     *
     * The reports the caller's sharing lets them open, alphabetically.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/k8s-efficiency-reports
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<KubernetesEfficiencyReport>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/k8s-efficiency-reports',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): KubernetesEfficiencyReport => KubernetesEfficiencyReport::fromArray(Coerce::toArray($item)));
    }

    /**
     * Picker options for Kubernetes efficiency reports
     *
     * Clusters, regions, namespaces, node pools and label keys present on the org's Kubernetes
     * cost rows, narrowed to the caller's cost visibility scope.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/k8s-efficiency-reports/options
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function options(?string $orgId = null, ?RequestOptions $options = null): KubernetesEfficiencyOptions
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/k8s-efficiency-reports/options',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return KubernetesEfficiencyOptions::fromArray(Coerce::toArray($data));
    }

    /**
     * Run an unsaved Kubernetes efficiency report config
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/k8s-efficiency-reports/query
     *
     * Raises on 400: Bad request
     *
     * @param array{config: array<string, mixed>} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function query(array $body, ?string $orgId = null, ?RequestOptions $options = null): KubernetesEfficiencyResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/k8s-efficiency-reports/query',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return KubernetesEfficiencyResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Run a Kubernetes efficiency report
     *
     * Per row and in total: total, used, requested-but-unused, unmeasured, idle and overhead cost,
     * efficiency on the report's basis, a per-category breakdown and a per-period series.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/k8s-efficiency-reports/{id}/run
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function run(string $id, ?string $orgId = null, ?RequestOptions $options = null): KubernetesEfficiencyRunResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/k8s-efficiency-reports/{id}/run',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return KubernetesEfficiencyRunResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace a Kubernetes efficiency report
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/k8s-efficiency-reports/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, KubernetesEfficiencyReportInput $body, ?string $orgId = null, ?RequestOptions $options = null): KubernetesEfficiencyReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/k8s-efficiency-reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return KubernetesEfficiencyReport::fromArray(Coerce::toArray($data));
    }

    /**
     * Values of one label on Kubernetes cost rows
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/k8s-efficiency-reports/values
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{values: list<string>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function values(string $tagKey, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/k8s-efficiency-reports/values',
                pathParams: ['orgId' => $orgId],
                query: ['tagKey' => $tagKey],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
