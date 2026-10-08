<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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
use Infrawrench\Sdk\Model\PrCheckPreview;
use Infrawrench\Sdk\Model\PrCheckRun;
use Infrawrench\Sdk\Model\PrCheckStatus;
use Infrawrench\Sdk\RequestOptions;

/** `$client->prChecks` */
final class PrChecksNamespace extends ApiNamespace
{
    /** `$client->prChecks->repositories` */
    public readonly PrChecksRepositoriesNamespace $repositories;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->repositories = new PrChecksRepositoriesNamespace($this->transport);
    }

    /**
     * Get pull request check settings and installation access
     *
     * _Requires permission: `iac:read`._
     *
     * GET /api/org/{orgId}/pr-checks
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): PrCheckStatus
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/pr-checks',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return PrCheckStatus::fromArray(Coerce::toArray($data));
    }

    /**
     * Preview a pull request check without posting it
     *
     * Runs the same analysis the check posts, for a pull request in a configured repository or for
     * file contents from a local diff. Reads only: nothing is posted to GitHub and nothing is
     * stored.
     *
     * _Requires permission: `iac:read`._
     *
     * POST /api/org/{orgId}/pr-checks/preview
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 502: GitHub refused the request or was unreachable
     *
     * @param array{repositoryId: string, pullNumber: int}|array{files: list<array{path: string, before: string|null, after: string|null}>, repo?: string} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function preview(array $body, ?string $orgId = null, ?RequestOptions $options = null): PrCheckPreview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/pr-checks/preview',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return PrCheckPreview::fromArray(Coerce::toArray($data));
    }

    /**
     * List recent pull request checks
     *
     * _Requires permission: `iac:read`._
     *
     * GET /api/org/{orgId}/pr-checks/runs
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<PrCheckRun>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function runs(?string $orgId = null, ?string $repositoryId = null, ?int $limit = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/pr-checks/runs',
                pathParams: ['orgId' => $orgId],
                query: ['repositoryId' => $repositoryId, 'limit' => $limit],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): PrCheckRun => PrCheckRun::fromArray(Coerce::toArray($item)));
    }
}
