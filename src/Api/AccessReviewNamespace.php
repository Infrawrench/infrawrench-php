<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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
use Infrawrench\Sdk\Model\AccessReviewResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->accessReview` */
final class AccessReviewNamespace extends ApiNamespace
{
    /** `$client->accessReview->dismissals` */
    public readonly AccessReviewDismissalsNamespace $dismissals;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->dismissals = new AccessReviewDismissalsNamespace($this->transport);
    }

    /**
     * Export the access review as compliance evidence
     *
     * The same review as a downloadable file, one row per finding. `format=csv` (the default)
     * returns RFC 4180 CSV with every cell quoted and spreadsheet formulas neutralised;
     * `format=json` returns the full response body pretty-printed.
     *
     * Dismissed findings are included and labelled in both formats, with the note and the person
     * who accepted them: an evidence pack answers what you found *and* what you decided. Exports
     * are recorded in the audit log.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/access-review/export
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'csv'|'json'|null $format Defaults to "csv".
     * @param int|null $staleDays Staleness window in days. Defaults to 90.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function export(?string $orgId = null, ?string $format = null, ?int $staleDays = null, ?RequestOptions $options = null): AccessReviewResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/access-review/export',
                pathParams: ['orgId' => $orgId],
                query: ['format' => $format, 'staleDays' => $staleDays],
            ),
            $options,
        );

        return AccessReviewResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Review the principals inside your connected clouds
     *
     * Every IAM user and role, service account, app registration, group, role binding and
     * long-lived API key your connected accounts have synced, with the findings that have evidence
     * against them: unused beyond the staleness window, holding administrative or wildcard
     * permissions, past the rotation budget their plugin declares, carrying no recorded owner, or
     * signing in without a second factor.
     *
     * This is about principals in **your** clouds — it is neither your Infrawrench team's roles
     * (`/team`) nor the credentials Infrawrench stores for you (`/credential-hygiene`).
     *
     * No provider API calls are made: everything is computed from already-synced fields, so a
     * principal whose provider does not report last use is reported with `activity: "unknown"` and
     * is never called stale. Findings the organization has dismissed are reported separately under
     * `dismissed` and are excluded from `findings`, `counts`, `byRule` and the security alerts.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/access-review
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param int|null $staleDays Staleness window in days. Defaults to 90.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?int $staleDays = null, ?RequestOptions $options = null): AccessReviewResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/access-review',
                pathParams: ['orgId' => $orgId],
                query: ['staleDays' => $staleDays],
            ),
            $options,
        );

        return AccessReviewResponse::fromArray(Coerce::toArray($data));
    }
}
