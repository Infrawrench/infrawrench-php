<?php

/*
 * infrawrench/sdk v1.100.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.100.0).
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
use Infrawrench\Sdk\Model\CiStatus;
use Infrawrench\Sdk\Model\CiUsage;
use Infrawrench\Sdk\RequestOptions;

/** `$client->ci` */
final class CiNamespace extends ApiNamespace
{
    /** `$client->ci->accounts` */
    public readonly CiAccountsNamespace $accounts;

    /** `$client->ci->runs` */
    public readonly CiRunsNamespace $runs;

    /** `$client->ci->values` */
    public readonly CiValuesNamespace $values;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->accounts = new CiAccountsNamespace($this->transport);
        $this->runs = new CiRunsNamespace($this->transport);
        $this->values = new CiValuesNamespace($this->transport);
    }

    /**
     * CI status and the GitHub accounts that run it
     *
     * _Requires permission: `ci:read`._
     *
     * GET /api/org/{orgId}/ci
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): CiStatus
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ci',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CiStatus::fromArray(Coerce::toArray($data));
    }

    /**
     * CI usage in a month: runs, compute and cache storage
     *
     * _Requires permission: `ci:read`._
     *
     * GET /api/org/{orgId}/ci/usage
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function usage(?string $orgId = null, ?string $month = null, ?RequestOptions $options = null): CiUsage
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ci/usage',
                pathParams: ['orgId' => $orgId],
                query: ['month' => $month],
            ),
            $options,
        );

        return CiUsage::fromArray(Coerce::toArray($data));
    }
}
