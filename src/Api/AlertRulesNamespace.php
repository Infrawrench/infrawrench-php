<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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
use Infrawrench\Sdk\Model\AlertRulesResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->alertRules` */
final class AlertRulesNamespace extends ApiNamespace
{
    /** `$client->alertRules->deliveries` */
    public readonly AlertRulesDeliveriesNamespace $deliveries;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->deliveries = new AlertRulesDeliveriesNamespace($this->transport);
    }

    /**
     * Persist the default rule so it can be edited
     *
     * A no-op when the organization already has rules.
     *
     * POST /api/org/{orgId}/alert-rules/adopt-defaults
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{rules: list<array<string, mixed>>, adopted: bool}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function adoptDefaults(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/alert-rules/adopt-defaults',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Get the organization's alert routing rules
     *
     * Returns the rules in evaluation order, plus the channels and accounts a rule can name so a
     * client can render destinations by name. An organization that has saved no rules gets the
     * synthesized default with `usingDefaults: true`.
     *
     * GET /api/org/{orgId}/alert-rules
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): AlertRulesResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/alert-rules',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return AlertRulesResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace the organization's alert routing rules
     *
     * Whole-list replacement in one transaction. Order is part of the meaning — a rule is only
     * correct relative to the ones above it — so a reorder applied as several requests would leave
     * a window in which alerts route somewhere nobody asked for. Positions are re-derived from
     * array order.
     *
     * PUT /api/org/{orgId}/alert-rules
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{rules: list<array<string, mixed>>}|null $body
     * @return array{rules: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/alert-rules',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
