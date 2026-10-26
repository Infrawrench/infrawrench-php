<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
     * Search resources, workflows and (with `kinds`) saved objects across the org
     *
     * Without `kinds`: resources (capped at 50, substring match over name, account, provider and
     * type) and workflows; requires `resources:read`. With `kinds`: the command palette's index.
     * Each named kind the caller's role can read is searched (a kind it cannot read is skipped,
     * not refused), narrowed to the objects the caller could open (per-object sharing for cost
     * reports, folders, dashboards and canvases; cost visibility for budgets), and fuzzy-ranked:
     * every whitespace-separated token must match the name or a supporting label, as a substring
     * or an in-order subsequence. At most 8 hits per saved-object kind and 50 resources; kinds are
     * ordered by their best hit.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/search
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $kinds `all`, or a comma-separated list of `SearchResultKind` values. An unknown kind is a 400.
     * @return list<SearchHit>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?string $q = null, ?string $kinds = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/search',
                pathParams: ['orgId' => $orgId],
                query: ['q' => $q, 'kinds' => $kinds],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): SearchHit => SearchHit::fromArray(Coerce::toArray($item)));
    }
}
