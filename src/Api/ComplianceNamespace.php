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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\ComplianceStatus;
use Infrawrench\Sdk\RequestOptions;

/** `$client->compliance` */
final class ComplianceNamespace extends ApiNamespace
{
    /** `$client->compliance->controls` */
    public readonly ComplianceControlsNamespace $controls;

    /** `$client->compliance->schedules` */
    public readonly ComplianceSchedulesNamespace $schedules;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->controls = new ComplianceControlsNamespace($this->transport);
        $this->schedules = new ComplianceSchedulesNamespace($this->transport);
    }

    /**
     * List compliance frameworks
     *
     * The framework registry: SOC 2 Trust Services Criteria and ISO/IEC 27001:2022 Annex A, each
     * listing only the controls Infrawrench holds evidence for.
     *
     * _Requires permission: `audit:read`._
     *
     * GET /api/org/{orgId}/compliance/frameworks
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{frameworks: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function frameworks(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/compliance/frameworks',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Compliance status for a framework and period
     *
     * Runs every evidence source the framework maps (access review, just-in-time access, the audit
     * log, posture, vulnerabilities, backup coverage, restore drills, the change timeline, change
     * freezes, session recordings, incidents, service scorecards, leaked credentials) and returns
     * a status per control. Makes no provider API calls. A source whose own permission the caller
     * lacks comes back `unavailable` naming it, rather than failing the request.
     *
     * _Requires permission: `audit:read`._
     *
     * GET /api/org/{orgId}/compliance
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $framework Framework registry id: `soc2` or `iso27001`.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from First day of the period (UTC). Defaults to 90 days before `to`.
     * @param string|null $to Last day of the period, inclusive (UTC). Defaults to today.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $framework, ?string $orgId = null, ?string $from = null, ?string $to = null, ?RequestOptions $options = null): ComplianceStatus
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/compliance',
                pathParams: ['orgId' => $orgId],
                query: ['framework' => $framework, 'from' => $from, 'to' => $to],
            ),
            $options,
        );

        return ComplianceStatus::fromArray(Coerce::toArray($data));
    }

    /**
     * Download an evidence pack
     *
     * A ZIP holding `summary.pdf`, `controls.csv`/`controls.json`, one CSV and JSON per control
     * under `controls/`, one CSV and JSON per evidence source under `evidence/`, `manifest.json`
     * (every other file with its SHA-256) and `SHA256SUMS` (the manifest's own digest, in
     * `sha256sum -c` format). Audited as `compliance.pack_exported`.
     *
     * _Requires permission: `audit:read`._
     *
     * GET /api/org/{orgId}/compliance/pack
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $framework Framework registry id: `soc2` or `iso27001`.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from First day of the period (UTC). Defaults to 90 days before `to`.
     * @param string|null $to Last day of the period, inclusive (UTC). Defaults to today.
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function pack(string $framework, ?string $orgId = null, ?string $from = null, ?string $to = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/compliance/pack',
                pathParams: ['orgId' => $orgId],
                query: ['framework' => $framework, 'from' => $from, 'to' => $to],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }
}
