<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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
use Infrawrench\Sdk\Model\CiAccessOverview;
use Infrawrench\Sdk\Model\CiResourceOutputs;
use Infrawrench\Sdk\RequestOptions;

/** `$client->ci->access` */
final class CiAccessNamespace extends ApiNamespace
{
    /** `$client->ci->access->connections` */
    public readonly CiAccessConnectionsNamespace $connections;

    /** `$client->ci->access->grants` */
    public readonly CiAccessGrantsNamespace $grants;

    /** `$client->ci->access->sshKeys` */
    public readonly CiAccessSshKeysNamespace $sshKeys;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->connections = new CiAccessConnectionsNamespace($this->transport);
        $this->grants = new CiAccessGrantsNamespace($this->transport);
        $this->sshKeys = new CiAccessSshKeysNamespace($this->transport);
    }

    /**
     * What CI jobs may use: connections, resources and SSH keys
     *
     * Every connection whose provider can run CI jobs or lend its credentials, with what it is
     * allowed; the resources granted to CI; and the SSH keys their owners lend. Nothing secret.
     *
     * _Requires permission: `ci:read`._
     *
     * GET /api/org/{orgId}/ci/access
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): CiAccessOverview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ci/access',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CiAccessOverview::fromArray(Coerce::toArray($data));
    }

    /**
     * What a resource can be granted to CI
     *
     * _Requires permission: `ci-access:write`._
     *
     * GET /api/org/{orgId}/ci/access/resource-outputs
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $resourceId The resource's id.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function resourceOutputs(string $resourceId, ?string $orgId = null, ?RequestOptions $options = null): CiResourceOutputs
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ci/access/resource-outputs',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId],
            ),
            $options,
        );

        return CiResourceOutputs::fromArray(Coerce::toArray($data));
    }
}
