<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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
use Infrawrench\Sdk\Model\EnvironmentCostEstimate;
use Infrawrench\Sdk\Model\EnvironmentEstimateRequest;
use Infrawrench\Sdk\Model\EnvironmentInstance;
use Infrawrench\Sdk\Model\EnvironmentInstantiateRequest;
use Infrawrench\Sdk\Model\EnvironmentTemplate;
use Infrawrench\Sdk\Model\EnvironmentTemplateInput;
use Infrawrench\Sdk\Model\EnvironmentTemplateList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->environments->templates` */
final class EnvironmentsTemplatesNamespace extends ApiNamespace
{
    /**
     * Create an environment template
     *
     * Save a capture draft as a template. Member keys must be unique, every parameter and member
     * reference must resolve, and the members must be orderable — a dependency cycle is rejected
     * here rather than half-way through an apply. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/environments/templates
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: A template with that name already exists
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?EnvironmentTemplateInput $body = null, ?RequestOptions $options = null): EnvironmentTemplate
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/environments/templates',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return EnvironmentTemplate::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an environment template
     *
     * Live instances keep running and keep their TTL — they own real resources, and the template
     * is only where they came from. Their `templateId` becomes null; the denormalized
     * `templateName` is what the surface reads. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/environments/templates/{templateId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $templateId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/environments/templates/{templateId}',
                pathParams: ['orgId' => $orgId, 'templateId' => $templateId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * Price an instantiation before it runs
     *
     * Runs each member's create fields through the plugin's own `estimateCost`. A member the
     * plugin cannot price is counted in `unpricedCount` and makes the total `partial` — `null` is
     * never rounded to zero.
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/environments/templates/{templateId}/estimate
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function estimate(string $templateId, ?string $orgId = null, ?EnvironmentEstimateRequest $body = null, ?RequestOptions $options = null): EnvironmentCostEstimate
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/environments/templates/{templateId}/estimate',
                pathParams: ['orgId' => $orgId, 'templateId' => $templateId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return EnvironmentCostEstimate::fromArray(Coerce::toArray($data));
    }

    /**
     * List environment templates
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/environments/templates
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): EnvironmentTemplateList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/environments/templates',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return EnvironmentTemplateList::fromArray(Coerce::toArray($data));
    }

    /**
     * Get an environment template
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/environments/templates/{templateId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdEnvironmentsTemplatesTemplateId(string $templateId, ?string $orgId = null, ?RequestOptions $options = null): EnvironmentTemplate
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/environments/templates/{templateId}',
                pathParams: ['orgId' => $orgId, 'templateId' => $templateId],
            ),
            $options,
        );

        return EnvironmentTemplate::fromArray(Coerce::toArray($data));
    }

    /**
     * Stamp out an environment
     *
     * Creates the template's resources in dependency order through the ordinary `createResource`
     * path, name-prefixed per instance, and attaches an auto-delete lease to each so expiry runs
     * through the existing lease pass. `ttlHours` is **required**. Requires `resources:write`
     * **and** `resources:delete` (the lease is a standing deletion, the same rule `POST /leases`
     * applies), and is blocked by an active change freeze. A create that fails part-way returns a
     * `partial` instance whose created members are recorded and tearable-down, never an error with
     * orphaned resources behind it. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/environments/templates/{templateId}/instantiate
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The organization is at its live-environment limit
     *
     * Raises on 423: Blocked by an active change freeze. Retry with the `x-change-freeze-override:
     * true` header if you hold `freezes:override`; both blocks and overrides are audit-logged.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function instantiate(string $templateId, ?string $orgId = null, ?EnvironmentInstantiateRequest $body = null, ?RequestOptions $options = null): EnvironmentInstance
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/environments/templates/{templateId}/instantiate',
                pathParams: ['orgId' => $orgId, 'templateId' => $templateId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return EnvironmentInstance::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace an environment template
     *
     * The whole document is replaced. Live instances are unaffected. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/environments/templates/{templateId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $templateId, ?string $orgId = null, ?EnvironmentTemplateInput $body = null, ?RequestOptions $options = null): EnvironmentTemplate
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/environments/templates/{templateId}',
                pathParams: ['orgId' => $orgId, 'templateId' => $templateId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return EnvironmentTemplate::fromArray(Coerce::toArray($data));
    }
}
