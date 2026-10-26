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
use Infrawrench\Sdk\Model\SavingsFindingStatusFilter;
use Infrawrench\Sdk\Model\SavingsFindingStatusInput;
use Infrawrench\Sdk\Model\SavingsFindingsResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->savings->findings` */
final class SavingsFindingsNamespace extends ApiNamespace
{
    /**
     * List savings findings
     *
     * Every savings finder's findings (orphaned and idle resources, oversized resources, extended
     * support surcharges, unused SaaS seats) with a lifecycle status, a detected date and summary
     * tiles. Open findings that a scan stops reporting move to Completed automatically
     * (`resolution: resolved`); a finding that returns after that reopens as Ready with a new
     * detected date. A cost-scoped caller sees only findings on accounts granted to them outright.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/savings/findings
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $view Apply a saved view, by id or name. Explicit params override it.
     * @param SavingsFindingStatusFilter::*|null $status A status, `open` (Ready or In progress), or `all`.
     * @param string|null $kind Comma-separated finding kinds.
     * @param string|null $provider Comma-separated plugin ids.
     * @param string|null $account Comma-separated account ids.
     * @param string|null $region Comma-separated regions.
     * @param string|null $tag `key` or `key=value`; repeat for more terms (all must match).
     * @param string|null $minSavings Minimum monthly savings, in each finding's own currency. Unpriced findings never pass.
     * @param string|null $detectedFrom Detected on or after (UTC day).
     * @param string|null $detectedTo Detected on or before (UTC day).
     * @param string|null $q Case-insensitive text match over title, resource and account.
     * @param string|null $sort `<field>:<asc|desc>`; fields savings, detected, name, status_changed.
     * @param string|null $refresh `true` bypasses the right-sizing and extended support caches.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $view = null, ?string $status = null, ?string $kind = null, ?string $provider = null, ?string $account = null, ?string $region = null, ?string $tag = null, ?string $minSavings = null, ?string $detectedFrom = null, ?string $detectedTo = null, ?string $q = null, ?string $sort = null, ?string $refresh = null, ?RequestOptions $options = null): SavingsFindingsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/savings/findings',
                pathParams: ['orgId' => $orgId],
                query: ['view' => $view, 'status' => $status, 'kind' => $kind, 'provider' => $provider, 'account' => $account, 'region' => $region, 'tag' => $tag, 'minSavings' => $minSavings, 'detectedFrom' => $detectedFrom, 'detectedTo' => $detectedTo, 'q' => $q, 'sort' => $sort, 'refresh' => $refresh],
            ),
            $options,
        );

        return SavingsFindingsResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Change savings finding status
     *
     * Moves findings to a status, recording who, when and an optional note; Completed by hand
     * records `resolution: manual`. Audited per finding and published as the
     * `savings.finding.status_changed` event. Keys the caller cannot see come back in `missing`; a
     * 404 when none matched.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/savings/findings/status
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{updated: list<array<string, mixed>>, missing: list<string>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function status(SavingsFindingStatusInput $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/savings/findings/status',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
