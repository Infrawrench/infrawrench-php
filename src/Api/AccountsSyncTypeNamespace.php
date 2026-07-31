<?php

/*
 * infrawrench/sdk v0.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.20.0).
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
use Infrawrench\Sdk\Model\ResourceTypeId;
use Infrawrench\Sdk\Model\SyncedResource;
use Infrawrench\Sdk\RequestOptions;

/** `$client->accounts->syncType` */
final class AccountsSyncTypeNamespace extends ApiNamespace
{
    /**
     * Sync a single resource type and return its resources
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/accounts/{id}/sync-type/{typeId}
     *
     * Raises on 404: Not found
     *
     * Raises on 500: Server error
     *
     * @param ResourceTypeId::* $typeId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<SyncedResource>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $id, string $typeId, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/accounts/{id}/sync-type/{typeId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'typeId' => $typeId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): SyncedResource => SyncedResource::fromArray(Coerce::toArray($item)));
    }
}
