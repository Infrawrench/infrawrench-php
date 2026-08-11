<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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
use Infrawrench\Sdk\Model\OrgConfigApplyResult;
use Infrawrench\Sdk\Model\OrgConfigDocument;
use Infrawrench\Sdk\Model\OrgConfigPlan;
use Infrawrench\Sdk\Model\OrgConfigRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->config` */
final class ConfigNamespace extends ApiNamespace
{
    /**
     * Apply a configuration document
     *
     * Applies the document in a single transaction and returns the plan that was executed — all or
     * nothing, so a failure never leaves the organization halfway between two configurations.
     *
     * Requires the write permission of every section the document carries, so this cannot be used
     * to reach past a role that withholds one.
     *
     * _Requires permission: `config:write`._
     *
     * POST /api/org/{orgId}/config/apply
     *
     * Raises on 400: Bad request
     *
     * Raises on 402: Payment required — the organization's plan does not include this
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function apply(OrgConfigRequest $body, ?string $orgId = null, ?RequestOptions $options = null): OrgConfigApplyResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/config/apply',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return OrgConfigApplyResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Export the organization's configuration as one document
     *
     * Dashboards, workflows, custom graphs, budgets, metric alerts, synthetic probes, cost
     * centres, the tag policy and the org-wide alert settings, addressed by stable keys rather
     * than row ids so the result applies to any organization.
     *
     * Credentials, accounts, resources and workflow signing secrets are never included. Ordering
     * is stable, so re-exporting an unchanged organization produces the same bytes — commit it to
     * git and the diff is the change.
     *
     * Requires the read permission of every section exported; it refuses rather than silently
     * omitting one, because a partial document applied in `replace` mode would delete what the
     * exporter could not see.
     *
     * _Requires permission: `config:read`._
     *
     * GET /api/org/{orgId}/config/export
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $sections Comma-separated subset of sections to export. Defaults to all of: budgets, customGraphs, workflows, dashboards, metricAlerts, probes, costCentres, tagPolicy, alertSettings.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function export(?string $orgId = null, ?string $sections = null, ?RequestOptions $options = null): OrgConfigDocument
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/config/export',
                pathParams: ['orgId' => $orgId],
                query: ['sections' => $sections],
            ),
            $options,
        );

        return OrgConfigDocument::fromArray(Coerce::toArray($data));
    }

    /**
     * Preview what applying a document would do
     *
     * The dry run: validates the document, resolves its cross-references against this
     * organization, and returns the create/update/delete/unchanged plan without writing anything.
     * Read-only, so a reviewer with read access can run it on a pull request.
     *
     * _Requires permission: `config:read`._
     *
     * POST /api/org/{orgId}/config/plan
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function plan(OrgConfigRequest $body, ?string $orgId = null, ?RequestOptions $options = null): OrgConfigPlan
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/config/plan',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return OrgConfigPlan::fromArray(Coerce::toArray($data));
    }
}
