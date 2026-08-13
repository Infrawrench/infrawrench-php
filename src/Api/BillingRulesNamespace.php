<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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
use Infrawrench\Sdk\Model\BillingRule;
use Infrawrench\Sdk\Model\BillingRuleInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->billingRules` */
final class BillingRulesNamespace extends ApiNamespace
{
    /**
     * Create a billing rule
     *
     * Requires `org:settings:write` rather than `costs:write`: a billing rule changes every figure
     * the organisation reports about itself, which is a governance act on the scale of stating an
     * exchange rate, not the scale of saving a report.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/billing-rules
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(BillingRuleInput $body, ?string $orgId = null, ?RequestOptions $options = null): BillingRule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/billing-rules',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return BillingRule::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a billing rule
     *
     * Nothing cascades and nothing is restated: no adjustment was ever written into stored cost
     * data, so the next read simply computes without this rule.
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/billing-rules/{id}
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
                path: '/api/org/{orgId}/billing-rules/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a billing rule
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/billing-rules/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): BillingRule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/billing-rules/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return BillingRule::fromArray(Coerce::toArray($data));
    }

    /**
     * List billing rules in evaluation order
     *
     * Billing rules are the organisation's own adjustments to collected spend — a markup that
     * recovers shared overhead, a discount negotiated outside the provider's pricing, a shared
     * cluster reallocated onto the teams that use it.
     *
     * **They are applied at query time and never written into stored cost data.** Collected spend
     * stays exactly what the provider reported, so it can still be reconciled against an invoice,
     * and editing or deleting a rule restates nothing.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/billing-rules
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<BillingRule>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/billing-rules',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): BillingRule => BillingRule::fromArray(Coerce::toArray($item)));
    }

    /**
     * Update a billing rule
     *
     * A full replace, `enabled` included — switching a markup off is an edit of the rule, so there
     * is one audited action for “this rule changed” rather than two.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/billing-rules/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, BillingRuleInput $body, ?string $orgId = null, ?RequestOptions $options = null): BillingRule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/billing-rules/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return BillingRule::fromArray(Coerce::toArray($data));
    }
}
