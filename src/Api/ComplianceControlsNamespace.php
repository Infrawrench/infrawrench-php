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
use Infrawrench\Sdk\Model\ComplianceControlSetting;
use Infrawrench\Sdk\Model\ComplianceControlSettingInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->compliance->controls` */
final class ComplianceControlsNamespace extends ApiNamespace
{
    /**
     * Reset a control to applicable and unowned
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/compliance/controls/{frameworkId}/{controlId}
     *
     * Raises on 404: Not found
     *
     * @param string $frameworkId Framework registry id: `soc2` or `iso27001`.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $frameworkId, string $controlId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/compliance/controls/{frameworkId}/{controlId}',
                pathParams: ['orgId' => $orgId, 'frameworkId' => $frameworkId, 'controlId' => $controlId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List stored control decisions
     *
     * Only controls somebody decided about; a missing control is applicable and unowned.
     *
     * _Requires permission: `audit:read`._
     *
     * GET /api/org/{orgId}/compliance/controls
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $framework Framework registry id: `soc2` or `iso27001`.
     * @return array{settings: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $framework = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/compliance/controls',
                pathParams: ['orgId' => $orgId],
                query: ['framework' => $framework],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Get one control decision
     *
     * _Requires permission: `audit:read`._
     *
     * GET /api/org/{orgId}/compliance/controls/{frameworkId}/{controlId}
     *
     * Raises on 404: Not found
     *
     * @param string $frameworkId Framework registry id: `soc2` or `iso27001`.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdComplianceControlsFrameworkIdControlId(string $frameworkId, string $controlId, ?string $orgId = null, ?RequestOptions $options = null): ComplianceControlSetting
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/compliance/controls/{frameworkId}/{controlId}',
                pathParams: ['orgId' => $orgId, 'frameworkId' => $frameworkId, 'controlId' => $controlId],
            ),
            $options,
        );

        return ComplianceControlSetting::fromArray(Coerce::toArray($data));
    }

    /**
     * Set a control's applicability, owner and notes
     *
     * A full replace. Marking a control not applicable requires a justification. An owner is
     * either a member (`ownerUserId`) or a free-text label, not both. Audited.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/compliance/controls/{frameworkId}/{controlId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $frameworkId Framework registry id: `soc2` or `iso27001`.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $frameworkId, string $controlId, ?string $orgId = null, ?ComplianceControlSettingInput $body = null, ?RequestOptions $options = null): ComplianceControlSetting
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/compliance/controls/{frameworkId}/{controlId}',
                pathParams: ['orgId' => $orgId, 'frameworkId' => $frameworkId, 'controlId' => $controlId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return ComplianceControlSetting::fromArray(Coerce::toArray($data));
    }
}
