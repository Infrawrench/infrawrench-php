<?php

/*
 * infrawrench/sdk v0.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.34.0).
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
use Infrawrench\Sdk\Model\SearchHit;
use Infrawrench\Sdk\RequestOptions;

/** `$client->search` */
final class SearchNamespace extends ApiNamespace
{
    /**
     * Search resources (capped at 50 hits) and workflows across the org
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/search
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<SearchHit>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?string $q = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/search',
                pathParams: ['orgId' => $orgId],
                query: ['q' => $q],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): SearchHit => SearchHit::fromArray(Coerce::toArray($item)));
    }
}
