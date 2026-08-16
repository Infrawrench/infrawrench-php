<?php

/*
 * infrawrench/sdk v1.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.27.0).
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
use Infrawrench\Sdk\Model\CreateLinearIssueInput;
use Infrawrench\Sdk\Model\CreateLinearIssueResult;
use Infrawrench\Sdk\Model\LinearIntegration;
use Infrawrench\Sdk\Model\LinearIntegrationInput;
use Infrawrench\Sdk\Model\LinearIssueLink;
use Infrawrench\Sdk\Model\LinearSourceKind;
use Infrawrench\Sdk\Model\LinearTeam;
use Infrawrench\Sdk\Model\LinearVerifyInput;
use Infrawrench\Sdk\Model\LinearVerifyResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->linear` */
final class LinearNamespace extends ApiNamespace
{
    /**
     * Disconnect Linear
     *
     * Issue links already recorded are kept, so filed findings stay marked as filed.
     *
     * _Requires permission: `linear:write`._
     *
     * DELETE /api/org/{orgId}/linear
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/linear',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get the org's Linear connection
     *
     * The stored API key is never returned; `keyHint` stands in for it.
     *
     * _Requires permission: `linear:read`._
     *
     * GET /api/org/{orgId}/linear
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{integration: array<string, mixed>|null}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/linear',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * File a finding as a Linear issue
     *
     * Creates the issue via the issueCreate mutation, then records the link between it and the
     * finding. The link is what lets a list view show "already filed" instead of offering the
     * button again.
     *
     * _Requires permission: `linear:write`._
     *
     * POST /api/org/{orgId}/linear/issues
     *
     * Raises on 400: Bad request
     *
     * Raises on 502: Linear refused to create the issue, or was unreachable
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function issues(CreateLinearIssueInput $body, ?string $orgId = null, ?RequestOptions $options = null): CreateLinearIssueResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/linear/issues',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CreateLinearIssueResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Look up filed issues for a set of findings
     *
     * _Requires permission: `linear:read`._
     *
     * GET /api/org/{orgId}/linear/links
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param LinearSourceKind::*|null $sourceKind
     * @param list<string>|null $sourceId Repeat to narrow to specific findings. Omit to return every link of the kind — this is the batch lookup a list view makes once instead of one request per row.
     * @return list<LinearIssueLink>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function links(?string $orgId = null, ?string $sourceKind = null, ?array $sourceId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/linear/links',
                pathParams: ['orgId' => $orgId],
                query: ['sourceKind' => $sourceKind, 'sourceId' => $sourceId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): LinearIssueLink => LinearIssueLink::fromArray(Coerce::toArray($item)));
    }

    /**
     * List Linear teams
     *
     * Backs the team picker, so nobody has to know a team id by hand — issueCreate requires one,
     * and every issue belongs to exactly one team.
     *
     * _Requires permission: `linear:read`._
     *
     * GET /api/org/{orgId}/linear/teams
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<LinearTeam>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function teams(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/linear/teams',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): LinearTeam => LinearTeam::fromArray(Coerce::toArray($item)));
    }

    /**
     * Connect Linear, or update the connection
     *
     * _Requires permission: `linear:write`._
     *
     * PUT /api/org/{orgId}/linear
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(LinearIntegrationInput $body, ?string $orgId = null, ?RequestOptions $options = null): ?LinearIntegration
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/linear',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): LinearIntegration => LinearIntegration::fromArray(Coerce::toArray($value)));
    }

    /**
     * Check Linear credentials
     *
     * Runs the `viewer` query against the Linear GraphQL API, so a mistyped or revoked key is
     * reported on the settings form rather than on the first attempt to file an issue.
     *
     * _Requires permission: `linear:write`._
     *
     * POST /api/org/{orgId}/linear/verify
     *
     * Raises on 400: Bad request
     *
     * Raises on 502: Linear rejected the key or was unreachable
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function verify(?string $orgId = null, ?LinearVerifyInput $body = null, ?RequestOptions $options = null): LinearVerifyResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/linear/verify',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return LinearVerifyResult::fromArray(Coerce::toArray($data));
    }
}
